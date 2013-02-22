<?php

/*
 * This file is part of the Ivory CKEditor package.
 *
 * (c) Eric GELOEN <geloen.eric@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Ivory\CKEditorBundle\Twig;

use \Twig_Extension;

use Ivory\CKEditorBundle\Helper\AssetVersionTrimer;

/**
 * Trim asset version twig extension.
 *
 * @author GeLo <geloen.eric@gmail.com>
 */
class TrimAssetVersionTwigExtension extends Twig_Extension
{
    /** @param \Ivory\CKEditorBundle\Helper\AssetVersionTrimer */
    private $trimer;

    /**
     * Constructor.
     *
     * @param \Ivory\CKEditorBundle\Helper\AssetVersionTrimer $trimer
     */
    public function __construct(AssetVersionTrimer $trimer)
    {
        $this->trimer = $trimer;
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(
            'trim_asset_version' => new \Twig_Filter_Method($this, 'trim', array('is_safe' => array('html'))),
        );
    }

    /**
     * Calls the AssetVersionTrimer to trim an asset.
     *
     * @see AssetVersionTrimer
     *
     * @param string $asset An asset.
     *
     * @return string A trimed version of the asset.
     */
    public function trim($asset)
    {
        return $this->trimer->trim($asset);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'trim_asset_version';
    }
}
