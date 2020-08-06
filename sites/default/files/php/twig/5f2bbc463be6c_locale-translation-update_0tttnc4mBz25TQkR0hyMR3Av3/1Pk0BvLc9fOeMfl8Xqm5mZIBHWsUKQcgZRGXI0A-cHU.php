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

/* core/modules/locale/templates/locale-translation-update-info.html.twig */
class __TwigTemplate_b45c32b9ea4524826635290e8c81d237e0528575606de214f05b1e0e21cb6e6d extends \Twig\Template
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
        $tags = array("if" => 20, "set" => 21, "trans" => 22, "for" => 36);
        $filters = array("safe_join" => 21, "escape" => 22, "length" => 27, "format_date" => 37, "t" => 47, "default" => 52);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set', 'trans', 'for'],
                ['safe_join', 'escape', 'length', 'format_date', 't', 'default'],
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
        // line 18
        echo "<div class=\"locale-translation-update__wrapper\" tabindex=\"0\" role=\"button\">
  <span class=\"locale-translation-update__prefix visually-hidden\">Show description</span>
  ";
        // line 20
        if (($context["modules"] ?? null)) {
            // line 21
            echo "    ";
            $context["module_list"] = $this->extensions['Drupal\Core\Template\TwigExtension']->safeJoin($this->env, $this->sandbox->ensureToStringAllowed(($context["modules"] ?? null), 21, $this->source), ", ");
            // line 22
            echo "    <span class=\"locale-translation-update__message\">";
            echo t("Updates for: @module_list", array("@module_list" => ($context["module_list"] ?? null), ));
            echo "</span>
  ";
        } elseif (        // line 23
($context["not_found"] ?? null)) {
            // line 24
            echo "    <span class=\"locale-translation-update__message\">";
            // line 25
            echo \Drupal::translation()->formatPlural(abs(twig_length_filter($this->env,             // line 27
($context["not_found"] ?? null))), "Missing translations for one project", "Missing translations for @count projects", array());
            // line 30
            echo "</span>
  ";
        }
        // line 32
        echo "  ";
        if ((($context["updates"] ?? null) || ($context["not_found"] ?? null))) {
            // line 33
            echo "    <div class=\"locale-translation-update__details\">
      ";
            // line 34
            if (($context["updates"] ?? null)) {
                // line 35
                echo "        <ul>
          ";
                // line 36
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["updates"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["update"]) {
                    // line 37
                    echo "            <li>";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["update"], "name", [], "any", false, false, true, 37), 37, $this->source), "html", null, true);
                    echo " (";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, call_user_func_array($this->env->getFilter('format_date')->getCallable(), [$this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["update"], "timestamp", [], "any", false, false, true, 37), 37, $this->source), "html_date"]), "html", null, true);
                    echo ")</li>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['update'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 39
                echo "        </ul>
      ";
            }
            // line 41
            echo "      ";
            if (($context["not_found"] ?? null)) {
                // line 42
                echo "        ";
                // line 46
                echo "        ";
                if (($context["updates"] ?? null)) {
                    // line 47
                    echo "          ";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Missing translations for:"));
                    echo "
        ";
                }
                // line 49
                echo "        ";
                if (($context["not_found"] ?? null)) {
                    // line 50
                    echo "          <ul>
            ";
                    // line 51
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["not_found"] ?? null));
                    foreach ($context['_seq'] as $context["_key"] => $context["update"]) {
                        // line 52
                        echo "              <li>";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["update"], "name", [], "any", false, false, true, 52), 52, $this->source), "html", null, true);
                        echo " (";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((twig_get_attribute($this->env, $this->source, $context["update"], "version", [], "any", true, true, true, 52)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["update"], "version", [], "any", false, false, true, 52), 52, $this->source), t("no version"))) : (t("no version"))), "html", null, true);
                        echo "). ";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["update"], "info", [], "any", false, false, true, 52), 52, $this->source), "html", null, true);
                        echo "</li>
            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['update'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 54
                    echo "          </ul>
        ";
                }
                // line 56
                echo "      ";
            }
            // line 57
            echo "    </div>
  ";
        }
        // line 59
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "core/modules/locale/templates/locale-translation-update-info.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  165 => 59,  161 => 57,  158 => 56,  154 => 54,  141 => 52,  137 => 51,  134 => 50,  131 => 49,  125 => 47,  122 => 46,  120 => 42,  117 => 41,  113 => 39,  102 => 37,  98 => 36,  95 => 35,  93 => 34,  90 => 33,  87 => 32,  83 => 30,  81 => 27,  80 => 25,  78 => 24,  76 => 23,  71 => 22,  68 => 21,  66 => 20,  62 => 18,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/modules/locale/templates/locale-translation-update-info.html.twig", "/var/www/html/dongcuong/core/modules/locale/templates/locale-translation-update-info.html.twig");
    }
}
