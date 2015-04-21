<?php


namespace Asl\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

use Asl\Service\Analyzer;

class AnalyzeBookAccessTop20 extends Command
{

    public function configure ()
    {
        $this->setName('book_access_top20')
            ->setDescription('指定ログファイルを解析してブックアクセス数Top20を割り出す');

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
        $results = $service->analyzeBookAccessTop20();

        $summary = [];
        foreach ($results as $date => $books) {
            if (! isset($summary[0])) $summary[0] = '';
            $summary[0] .= sprintf('"%s","","",', $date);

            $i = 1;
            foreach ($books as $book => $value) {
                if (! isset($summary[$i])) $summary[$i] = '';
                $summary[$i] .= sprintf('"%s","%s","",', $book, $value);
                $i++;
            }

            if ($i != 21) {
                for (; $i < 21; $i++) {
                    $summary[$i] .= '"","","",';
                }
            }
        }

        foreach ($summary as $s) {
            $output->writeln($s);
        }
    }
}

