<?php

namespace TwbBundle\View\Helper;

class TwbBundleFontawesome extends \Zend\Form\View\Helper\AbstractHelper
{

    /**
     * @var string
     */
    private static $format = '<i %s></i>';

    /**
     * Invoke helper as functor, proxies to {@link render()}.
     * @param string $sFa
     * @param array $aFaAttributes : [optional]
     * @return string|\TwbBundle\View\Helper\TwbBundleFontawesome
     */
    public function __invoke($sFa = null, array $aFaAttributes = null)
    {
        if (!$sFa) {
            return $this;
        }
        return $this->render($sFa, $aFaAttributes);
    }

    /**
     * Retrieve glyphicon markup
     * @param string $sFontAwesome
     * @param  array $aFontAwesomeAttributes : [optionnal]
     * @throws \InvalidArgumentException
     * @return string
     */
    public function render($sFontAwesome, array $aFontAwesomeAttributes = null)
    {
        if (!is_scalar($sFontAwesome)) {
            throw new \InvalidArgumentException('Font Awesome Icon expects a scalar value, "' . gettype($sFontAwesome) . '" given');
        }

        if (empty($aFontAwesomeAttributes)) {
            $aFontAwesomeAttributes = array('class' => 'fa');
        } else {

            if (empty($aFontAwesomeAttributes['class'])) {
                $aFontAwesomeAttributes['class'] = 'fa';
            } elseif (!preg_match('/(\s|^)fa(\s|$)/', $aFontAwesomeAttributes['class'])) {
                $aFontAwesomeAttributes['class'] .= ' fa';
            }
        }

        if (strpos('fa-', $sFontAwesome) !== 0) {
            $sFontAwesome = 'fa-' . $sFontAwesome;
        }

        if (!preg_match('/(\s|^)' . preg_quote($sFontAwesome, '/') . '(\s|$)/', $aFontAwesomeAttributes['class'])) {
            $aFontAwesomeAttributes['class'] .= ' ' . $sFontAwesome;
        }

        return sprintf(
                self::$format, $this->createAttributesString($aFontAwesomeAttributes)
        );
    }

}
