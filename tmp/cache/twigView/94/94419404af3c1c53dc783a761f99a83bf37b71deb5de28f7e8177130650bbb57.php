<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* C:\xampp\htdocs\Sistema\vendor\cakephp\bake\src\Template\Bake\\Mailer\mailer.twig */
class __TwigTemplate_1603be0aae93e8d8e88328d692b39e67be308c2a0d959418312018ae2d083170 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_770edd655cdeb606afc443e4edb1f19b4248a91788cb82e88bf8b9495a7c5cfa = $this->env->getExtension("WyriHaximus\\TwigView\\Lib\\Twig\\Extension\\Profiler");
        $__internal_770edd655cdeb606afc443e4edb1f19b4248a91788cb82e88bf8b9495a7c5cfa->enter($__internal_770edd655cdeb606afc443e4edb1f19b4248a91788cb82e88bf8b9495a7c5cfa_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "C:\\xampp\\htdocs\\Sistema\\vendor\\cakephp\\bake\\src\\Template\\Bake\\\\Mailer\\mailer.twig"));

        // line 16
        echo "<?php
namespace ";
        // line 17
        echo twig_escape_filter($this->env, ($context["namespace"] ?? null), "html", null, true);
        echo "\\Mailer;

use Cake\\Mailer\\Mailer;

/**
 * ";
        // line 22
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo " mailer.
 */
class ";
        // line 24
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "Mailer extends Mailer
{
    /**
     * Mailer's name.
     *
     * @var string
     */
    public static \$name = '";
        // line 31
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "';
}
";
        
        $__internal_770edd655cdeb606afc443e4edb1f19b4248a91788cb82e88bf8b9495a7c5cfa->leave($__internal_770edd655cdeb606afc443e4edb1f19b4248a91788cb82e88bf8b9495a7c5cfa_prof);

    }

    public function getTemplateName()
    {
        return "C:\\xampp\\htdocs\\Sistema\\vendor\\cakephp\\bake\\src\\Template\\Bake\\\\Mailer\\mailer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 31,  49 => 24,  44 => 22,  36 => 17,  33 => 16,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         2.0.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
#}
<?php
namespace {{ namespace }}\\Mailer;

use Cake\\Mailer\\Mailer;

/**
 * {{ name }} mailer.
 */
class {{ name }}Mailer extends Mailer
{
    /**
     * Mailer's name.
     *
     * @var string
     */
    public static \$name = '{{ name }}';
}
", "C:\\xampp\\htdocs\\Sistema\\vendor\\cakephp\\bake\\src\\Template\\Bake\\\\Mailer\\mailer.twig", "C:\\xampp\\htdocs\\Sistema\\vendor\\cakephp\\bake\\src\\Template\\Bake\\\\Mailer\\mailer.twig");
    }
}
