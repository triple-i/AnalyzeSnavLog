<?php


namespace Asl\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

use Asl\Service\Analyzer;

class AnalyzeUserAccess extends Command
{

    public function configure ()
    {
        $this->setName('user_access')
            ->setDescription('指定ログファイルを解析して利用者数を割り出す');

        $this->addArgument('log_file', InputArgument::REQUIRED, 'ログファイルへのパスを指定する')
            ->setHelp(sprintf(
                '%sログファイルのパス%s',
                PHP_EOL,
                PHP_EOL
            ));

        $this->addArgument('date', InputArgument::OPTIONAL, '対象範囲')
            ->setHelp(sprintf(
                '%s集計する範囲%s',
                PHP_EOL,
                PHP_EOL
            ));
    }


    protected function execute (InputInterface $input, OutputInterface $output)
    {
        $log_file = $input->getArgument('log_file');
        $date = $input->getArgument('date');

        $service = new Analyzer($log_file, $date);
        $results = $service->analyzeUserAccess();

        // display
        foreach ($results as $date => $total) {
            $output->writeln(sprintf('"%s","%s"', $date, $total));
        }
    }
}

