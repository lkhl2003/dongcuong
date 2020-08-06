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

/* themes/custom/dongcuong/templates/dongcuong-node-xac-nhan-dan-su-form.html.twig */
class __TwigTemplate_b729da2e03645175918ebbc55af98eaf093d2473a58b1490bf54a133c6534f63 extends \Twig\Template
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
        $tags = array();
        $filters = array("escape" => 3);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape'],
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
        // line 1
        echo "<div class=\"row\">
  <div class=\"col-sm-12 col-md-8 col-lg-8\">
    ";
        // line 3
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "title", [], "any", false, false, true, 3), 3, $this->source), "html", null, true);
        echo "
  </div>
  <div class=\"col-sm-12 col-md-4 col-lg-4\">
    ";
        // line 6
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "field_ngaysinh", [], "any", false, false, true, 6), 6, $this->source), "html", null, true);
        echo "
  </div>  
</div>
<div class=\"row\">  
  <div class=\"col-sm-12\">
    ";
        // line 11
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "field_noithuongtru", [], "any", false, false, true, 11), 11, $this->source), "html", null, true);
        echo "
  </div>
</div>

";
        // line 15
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "form_build_id", [], "any", false, false, true, 15), 15, $this->source), "html", null, true);
        echo "
";
        // line 16
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "form_id", [], "any", false, false, true, 16), 16, $this->source), "html", null, true);
        echo "
";
        // line 17
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "form_token", [], "any", false, false, true, 17), 17, $this->source), "html", null, true);
        echo "

";
        // line 19
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "actions", [], "any", false, false, true, 19), 19, $this->source), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "themes/custom/dongcuong/templates/dongcuong-node-xac-nhan-dan-su-form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 19,  95 => 17,  91 => 16,  87 => 15,  80 => 11,  72 => 6,  66 => 3,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/dongcuong/templates/dongcuong-node-xac-nhan-dan-su-form.html.twig", "/var/www/html/dongcuong/themes/custom/dongcuong/templates/dongcuong-node-xac-nhan-dan-su-form.html.twig");
    }
}
