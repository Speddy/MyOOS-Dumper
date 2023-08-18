<?php

declare (strict_types=1);
namespace RectorPrefix202308\OndraM\CiDetector;

use RectorPrefix202308\OndraM\CiDetector\Ci\CiInterface;
use RectorPrefix202308\OndraM\CiDetector\Exception\CiNotDetectedException;
/**
 * Unified way to get environment variables from current continuous integration server
 */
class CiDetector implements CiDetectorInterface
{
    final public const CI_APPVEYOR = 'AppVeyor';
    final public const CI_AWS_CODEBUILD = 'AWS CodeBuild';
    final public const CI_AZURE_PIPELINES = 'Azure Pipelines';
    final public const CI_BAMBOO = 'Bamboo';
    final public const CI_BITBUCKET_PIPELINES = 'Bitbucket Pipelines';
    final public const CI_BUDDY = 'Buddy';
    final public const CI_CIRCLE = 'CircleCI';
    final public const CI_CODESHIP = 'Codeship';
    final public const CI_CONTINUOUSPHP = 'continuousphp';
    final public const CI_DRONE = 'drone';
    final public const CI_GITHUB_ACTIONS = 'GitHub Actions';
    final public const CI_GITLAB = 'GitLab';
    final public const CI_JENKINS = 'Jenkins';
    final public const CI_SOURCEHUT = 'SourceHut';
    final public const CI_TEAMCITY = 'TeamCity';
    final public const CI_TRAVIS = 'Travis CI';
    final public const CI_WERCKER = 'Wercker';
    private \RectorPrefix202308\OndraM\CiDetector\Env $environment;
    public final function __construct()
    {
        $this->environment = new Env();
    }
    public static function fromEnvironment(Env $environment) : self
    {
        $detector = new static();
        $detector->environment = $environment;
        return $detector;
    }
    public function isCiDetected() : bool
    {
        $ciServer = $this->detectCurrentCiServer();
        return $ciServer !== null;
    }
    public function detect() : CiInterface
    {
        $ciServer = $this->detectCurrentCiServer();
        if ($ciServer === null) {
            throw new CiNotDetectedException('No CI server detected in current environment');
        }
        return $ciServer;
    }
    /**
     * @return string[]
     */
    protected function getCiServers() : array
    {
        return [Ci\AppVeyor::class, Ci\AwsCodeBuild::class, Ci\AzurePipelines::class, Ci\Bamboo::class, Ci\BitbucketPipelines::class, Ci\Buddy::class, Ci\Circle::class, Ci\Codeship::class, Ci\Continuousphp::class, Ci\Drone::class, Ci\GitHubActions::class, Ci\GitLab::class, Ci\Jenkins::class, Ci\SourceHut::class, Ci\TeamCity::class, Ci\Travis::class, Ci\Wercker::class];
    }
    protected function detectCurrentCiServer() : ?CiInterface
    {
        $ciServers = $this->getCiServers();
        foreach ($ciServers as $ciClass) {
            $callback = [$ciClass, 'isDetected'];
            if (\is_callable($callback)) {
                if ($callback($this->environment)) {
                    return new $ciClass($this->environment);
                }
            }
        }
        return null;
    }
}
