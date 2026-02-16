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
    private string $hostedCenter;

    private function __construct($id, $hostedCenter)
    {
        parent::__construct($id);
        $this->hostedCenter = $hostedCenter;
    }

    public function __toString()
    {
        return "I'm a MoltBot agent with id:{$this->id}" . " Hosted on: {$this->hostedCenter}.</br>";
    }

    public static function getInstance($id, $hostedCenter)
    {
        if (self::$instance === null) {
            self::$instance = new MoltBot($id, $hostedCenter);
        }
        return self::$instance;
    }

    public function generateVideo($prompt)
    {
        echo "MoltBot:{$this->id} Generating video based on prompt: $prompt";
        $this->log('video generation');
    }
}

$myModel = MoltBot::getInstance('10.001', 'Amazon Cloud Cervice');
echo $myModel;
$myModel->generateVideo('Make a nostalgic video about Skype times..');
