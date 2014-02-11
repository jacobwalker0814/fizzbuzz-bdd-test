<?php

namespace JacobWalker0814\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class FizzBuzz extends Command
{
    protected function configure()
    {
        $this->setName('fizzbuzz')
            ->setDescription('Given a range this prints all numbers in that range replacing certain values with fizz, buzz, or fizzbuzz.')
            ->addArgument(
                'begin',
                InputArgument::REQUIRED,
                'Low end of the range.'
            )
            ->addArgument(
                'end',
                InputArgument::REQUIRED,
                'High end of the range.'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $begin = $input->getArgument("begin");
        $end = $input->getArgument("end");
        for ($i=$begin; $i<=$end; ++$i) {
            print $i . PHP_EOL;
        }
    }
}
