<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* core/modules/locale/templates/locale-translation-last-check.html.twig */
class __TwigTemplate_0bbc842c9967ec526a5d26986c749ed69e4256b86fd60c666b5dc656350685f2 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = array("if" => 19, "trans" => 20);
        $filters = array("escape" => 20, "t" => 22);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'trans'],
                ['escape', 't'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 17
        echo "<div class=\"locale checked\">
  <p>
  ";
        // line 19
        if (($context["last_checked"] ?? null)) {
            // line 20
            echo "    ";
            echo t("Last checked: @time ago", array("@time" => ($context["time"] ?? null), ));
            // line 21
            echo "  ";
        } else {
            // line 22
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Last checked: never"));
            echo "
  ";
        }
        // line 24
        echo "  <span class=\"check-manually\">(";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["link"] ?? null), 24, $this->source), "html", null, true);
        echo ")</span></p>
</div>
";
    }

    public function getTemplateName()
    {
        return "core/modules/locale/templates/locale-translation-last-check.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 24,  74 => 22,  71 => 21,  68 => 20,  66 => 19,  62 => 17,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/modules/locale/templates/locale-translation-last-check.html.twig", "/var/www/html/dongcuong/core/modules/locale/templates/locale-translation-last-check.html.twig");
    }
}
