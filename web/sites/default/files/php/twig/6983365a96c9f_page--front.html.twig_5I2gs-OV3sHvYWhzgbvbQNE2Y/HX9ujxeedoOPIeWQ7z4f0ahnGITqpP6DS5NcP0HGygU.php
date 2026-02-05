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

/* themes/custom/events_theme/templates/page--front.html.twig */
class __TwigTemplate_ba7abc7566153b0dd02b9cd011e9f1de extends Template
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
        // line 1
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("events_theme/global"), "html", null, true);
        yield "

<div class=\"layout-wrapper\">

  <header class=\"site-header\">
    ";
        // line 6
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 6), "html", null, true);
        yield "
    ";
        // line 7
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 7), "html", null, true);
        yield "
  </header>

  <div class=\"layout-main\">
    <aside class=\"site-sidebar\">
      ";
        // line 12
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar", [], "any", false, false, true, 12), "html", null, true);
        yield "
    </aside>

    <main class=\"site-content\">
      ";
        // line 16
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 16), "html", null, true);
        yield "
    </main>
  </div>

  <footer class=\"site-footer\">
    ";
        // line 21
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 21), "html", null, true);
        yield "
  </footer>

</div>


";
        // line 27
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("events_theme/global"), "html", null, true);
        yield "

";
        // line 29
        if ((array_key_exists("node", $context) && (CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "bundle", [], "any", false, false, true, 29) == "event"))) {
            // line 30
            yield "  <div class=\"layout-wrapper\">

    <header class=\"site-header\">
      ";
            // line 33
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 33), "html", null, true);
            yield "
      ";
            // line 34
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 34), "html", null, true);
            yield "
    </header>

    <div class=\"layout-main\">
      <aside class=\"site-sidebar\">
        ";
            // line 39
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar", [], "any", false, false, true, 39), "html", null, true);
            yield "
      </aside>

      <main class=\"site-content\">
        ";
            // line 43
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 43), "html", null, true);
            yield "
      </main>
    </div>

    <footer class=\"site-footer\">
      ";
            // line 48
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 48), "html", null, true);
            yield "
    </footer>

  </div>
";
        }
        // line 53
        yield "
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["page", "node"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/events_theme/templates/page--front.html.twig";
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
        return array (  135 => 53,  127 => 48,  119 => 43,  112 => 39,  104 => 34,  100 => 33,  95 => 30,  93 => 29,  88 => 27,  79 => 21,  71 => 16,  64 => 12,  56 => 7,  52 => 6,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{{ attach_library('events_theme/global') }}

<div class=\"layout-wrapper\">

  <header class=\"site-header\">
    {{ page.header }}
    {{ page.primary_menu }}
  </header>

  <div class=\"layout-main\">
    <aside class=\"site-sidebar\">
      {{ page.sidebar }}
    </aside>

    <main class=\"site-content\">
      {{ page.content }}
    </main>
  </div>

  <footer class=\"site-footer\">
    {{ page.footer }}
  </footer>

</div>


{{ attach_library('events_theme/global') }}

{% if node is defined and node.bundle == 'event' %}
  <div class=\"layout-wrapper\">

    <header class=\"site-header\">
      {{ page.header }}
      {{ page.primary_menu }}
    </header>

    <div class=\"layout-main\">
      <aside class=\"site-sidebar\">
        {{ page.sidebar }}
      </aside>

      <main class=\"site-content\">
        {{ page.content }}
      </main>
    </div>

    <footer class=\"site-footer\">
      {{ page.footer }}
    </footer>

  </div>
{% endif %}

", "themes/custom/events_theme/templates/page--front.html.twig", "C:\\xampp\\htdocs\\drupal11\\web\\themes\\custom\\events_theme\\templates\\page--front.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 29];
        static $filters = ["escape" => 1];
        static $functions = ["attach_library" => 1];

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
                ['attach_library'],
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
