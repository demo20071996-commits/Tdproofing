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

/* core/themes/claro/templates/classy/field/field--node--created.html.twig */
class __TwigTemplate_5c5ce5806ed05cee8bb51c408c1ab3da extends Template
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
        // line 28
        if ((($tmp =  !($context["is_inline"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 29
            yield "  ";
            yield from $this->load("field.html.twig", 29)->unwrap()->yield($context);
        } else {
            // line 32
            $context["classes"] = ["field", ("field--name-" . \Drupal\Component\Utility\Html::getClass(            // line 34
($context["field_name"] ?? null))), ("field--type-" . \Drupal\Component\Utility\Html::getClass(            // line 35
($context["field_type"] ?? null))), ("field--label-" .             // line 36
($context["label_display"] ?? null))];
            // line 39
            yield "<span";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 39), "html", null, true);
            yield ">";
            // line 40
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["items"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 41
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "content", [], "any", false, false, true, 41), "html", null, true);
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 43
            yield "</span>
";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["is_inline", "field_name", "field_type", "label_display", "attributes", "items"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "core/themes/claro/templates/classy/field/field--node--created.html.twig";
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
        return array (  69 => 43,  63 => 41,  59 => 40,  55 => 39,  53 => 36,  52 => 35,  51 => 34,  50 => 32,  46 => 29,  44 => 28,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{#
/**
 * @file
 * Theme override for the node created field.
 *
 * This is an override of field.html.twig for the node created field. See that
 * template for documentation about its details and overrides.
 *
 * Available variables:
 * - attributes: HTML attributes for the containing span element.
 * - items: List of all the field items. Each item contains:
 *   - attributes: List of HTML attributes for each item.
 *   - content: The field item content.
 * - entity_type: The entity type to which the field belongs.
 * - field_name: The name of the field.
 * - field_type: The type of the field.
 * - label_display: The display settings for the label.
 * - is_inline: If false, display an ordinary field.
 *   If true, display an inline format, suitable for inside elements such as
 *   <span>, <h2> and so on.
 *
 * @see field.html.twig
 * @see node_preprocess_field__node()
 *
 * @todo Delete as part of https://www.drupal.org/node/3015623
 */
#}
{% if not is_inline %}
  {% include \"field.html.twig\" %}
{% else %}
{%
  set classes = [
    'field',
    'field--name-' ~ field_name|clean_class,
    'field--type-' ~ field_type|clean_class,
    'field--label-' ~ label_display,
  ]
%}
<span{{ attributes.addClass(classes) }}>
  {%- for item in items -%}
    {{ item.content }}
  {%- endfor -%}
</span>
{% endif %}
", "core/themes/claro/templates/classy/field/field--node--created.html.twig", "C:\\xampp\\htdocs\\drupal11\\web\\core\\themes\\claro\\templates\\classy\\field\\field--node--created.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 28, "include" => 29, "set" => 32, "for" => 40];
        static $filters = ["clean_class" => 34, "escape" => 39];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'include', 'set', 'for'],
                ['clean_class', 'escape'],
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
