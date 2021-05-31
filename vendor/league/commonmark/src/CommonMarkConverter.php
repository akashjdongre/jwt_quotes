<?php

/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * Original code based on the CommonMark JS reference parser (https://bitly.com/commonmark-js)
 *  - (c) John MacFarlane
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark;

/**
 * Converts CommonMark-compatible Markdown to HTML.
 */
class CommonMarkConverter extends MarkdownConverter
{
    /**
     * The currently-installed version.
     *
     * This might be a typical `x.y.z` version, or `x.y-dev`.
     *
     * @deprecated in 1.5.0 and will be removed from 2.0.0.
     *   Use \Composer\InstalledVersions provided by composer-runtime-api instead.
     */
<<<<<<< HEAD
    public const VERSION = '1.6.1';
=======
    public const VERSION = '1.6.2';
>>>>>>> 7d5ab4e1c98e115799dc73b985d64be841e7e260

    /**
     * Create a new commonmark converter instance.
     *
     * @param array<string, mixed>      $config
     * @param EnvironmentInterface|null $environment
     */
    public function __construct(array $config = [], EnvironmentInterface $environment = null)
    {
        if ($environment === null) {
            $environment = Environment::createCommonMarkEnvironment();
        } else {
<<<<<<< HEAD
            @\trigger_error(\sprintf('Passing an $environment into the "%s" constructor is deprecated in 1.6 and will not be supported in 2.0; use MarkdownConverter instead', self::class));
=======
            @\trigger_error(\sprintf('Passing an $environment into the "%s" constructor is deprecated in 1.6 and will not be supported in 2.0; use MarkdownConverter instead', self::class), \E_USER_DEPRECATED);
>>>>>>> 7d5ab4e1c98e115799dc73b985d64be841e7e260
        }

        if ($environment instanceof ConfigurableEnvironmentInterface) {
            $environment->mergeConfig($config);
        }

        parent::__construct($environment);
    }
}
