<?php
trait Logger
{
    public function log($info)
    {
        echo "</br>Logging data about $info..";
    }
}

interface VideoGenerationInterface
{
    public function generateVideo($prompt);
}

class LanguageModel
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
}

class MoltBot extends LanguageModel implements VideoGenerationInterface
{
    use Logger;
    private static $instance = null;
    private string $hosting;

    private function __construct($id, $hosting)
    {
        parent::__construct($id);
        $this->hosting = $hosting;
    }

    public function __toString()
    {
        return "I'm a MoltBot agent with id:{$this->id}" . " Hosted on: {$this->hosting}.</br>";
    }

    public static function getInstance($id, $hosting)
    {
        if (self::$instance === null) {
            self::$instance = new MoltBot($id, $hosting);
        }
        return self::$instance;
    }

    public function generateVideo($prompt)
    {
        echo "MoltBot:{$this->id} Generating video based on prompt: $prompt";
        $this->log('video generation');
    }
}

$myModel = MoltBot::getInstance('10.001', 'Amazon Cloud Service');
echo $myModel;
$myModel->generateVideo('Make a nostalgic video about Skype times..');
