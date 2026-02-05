<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* themes/custom/events_theme/templates/node/node--event--teaser.html.twig */
class __TwigTemplate_e22c1e26314e2adb869e33cb756a5c96 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 4
        yield "
<article class=\"event-card\">

  <div class=\"event-card__header\">
    ";
        // line 8
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_category", [], "any", false, false, true, 8)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 9
            yield "      <div class=\"event-category\">
        ";
            // line 10
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_category", [], "any", false, false, true, 10), "html", null, true);
            yield "
      </div>
    ";
        }
        // line 13
        yield "  </div>

  <h3 class=\"event-title\">
    <a href=\"";
        // line 16
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["url"] ?? null), "html", null, true);
        yield "\">";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["label"] ?? null), "html", null, true);
        yield "</a>
  </h3>

  ";
        // line 19
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_location", [], "any", false, false, true, 19)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 20
            yield "    <div class=\"event-location\">
       ";
            // line 21
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_location", [], "any", false, false, true, 21), "html", null, true);
            yield "
    </div>
  ";
        }
        // line 24
        yield "
  ";
        // line 25
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_summary", [], "any", false, false, true, 25)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 26
            yield "    <div class=\"event-summary\">
      ";
            // line 27
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_summary", [], "any", false, false, true, 27), "html", null, true);
            yield "
    </div>
  ";
        }
        // line 30
        yield "</article>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["content", "url", "label"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/events_theme/templates/node/node--event--teaser.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  99 => 30,  93 => 27,  90 => 26,  88 => 25,  85 => 24,  79 => 21,  76 => 20,  74 => 19,  66 => 16,  61 => 13,  55 => 10,  52 => 9,  50 => 8,  44 => 4,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{#
  Event card – teaser view
#}

<article class=\"event-card\">

  <div class=\"event-card__header\">
    {% if content.field_category %}
      <div class=\"event-category\">
        {{ content.field_category }}
      </div>
    {% endif %}
  </div>

  <h3 class=\"event-title\">
    <a href=\"{{ url }}\">{{ label }}</a>
  </h3>

  {% if content.field_location %}
    <div class=\"event-location\">
       {{ content.field_location }}
    </div>
  {% endif %}

  {% if content.field_summary %}
    <div class=\"event-summary\">
      {{ content.field_summary }}
    </div>
  {% endif %}
</article>
", "themes/custom/events_theme/templates/node/node--event--teaser.html.twig", "C:\\xampp\\htdocs\\drupal11\\web\\themes\\custom\\events_theme\\templates\\node\\node--event--teaser.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 8];
        static $filters = ["escape" => 10];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
                [],
                $this->source
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
}
