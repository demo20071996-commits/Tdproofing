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

/* core/themes/claro/templates/pager.html.twig */
class __TwigTemplate_4bc9cf5cf33c7962d389b4d2bc2bcdf7 extends Template
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
        // line 38
        if ((($tmp = ($context["items"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 39
            yield "  <nav class=\"pager\" role=\"navigation\" aria-labelledby=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["heading_id"] ?? null), "html", null, true);
            yield "\">
    <";
            // line 40
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["pagination_heading_level"] ?? null), "html", null, true);
            yield " id=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["heading_id"] ?? null), "html", null, true);
            yield "\" class=\"visually-hidden\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Pagination"));
            yield "</";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["pagination_heading_level"] ?? null), "html", null, true);
            yield ">
    <ul class=\"pager__items js-pager__items\">
      ";
            // line 43
            yield "      ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "first", [], "any", false, false, true, 43)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 44
                yield "        <li class=\"pager__item pager__item--action pager__item--first\">
          <a href=\"";
                // line 45
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "first", [], "any", false, false, true, 45), "href", [], "any", false, false, true, 45), "html", null, true);
                yield "\" title=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Go to first page"));
                yield "\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "first", [], "any", false, false, true, 45), "attributes", [], "any", false, false, true, 45), "href", "title"), "addClass", ["pager__link", "pager__link--action-link"], "method", false, false, true, 45), "html", null, true);
                yield ">
            <span class=\"visually-hidden\">";
                // line 46
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("First page"));
                yield "</span>
            <span class=\"pager__item-title pager__item-title--backwards\" aria-hidden=\"true\">
              ";
                // line 48
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::replace(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "first", [], "any", false, true, true, 48), "text", [], "any", true, true, true, 48)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "first", [], "any", false, false, true, 48), "text", [], "any", false, false, true, 48), t("First"))) : (t("First"))), ["«" => ""]), "html", null, true);
                yield "
            </span>
          </a>
        </li>
      ";
            }
            // line 53
            yield "
      ";
            // line 55
            yield "      ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, false, true, 55)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 56
                yield "        <li class=\"pager__item pager__item--action pager__item--previous\">
          <a href=\"";
                // line 57
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, false, true, 57), "href", [], "any", false, false, true, 57), "html", null, true);
                yield "\" title=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Go to previous page"));
                yield "\" rel=\"prev\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, false, true, 57), "attributes", [], "any", false, false, true, 57), "href", "title", "rel"), "addClass", ["pager__link", "pager__link--action-link"], "method", false, false, true, 57), "html", null, true);
                yield ">
            <span class=\"visually-hidden\">";
                // line 58
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Previous page"));
                yield "</span>
            <span class=\"pager__item-title pager__item-title--backwards\" aria-hidden=\"true\">
              ";
                // line 60
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::replace(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, true, true, 60), "text", [], "any", true, true, true, 60)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, false, true, 60), "text", [], "any", false, false, true, 60), t("Previous"))) : (t("Previous"))), ["‹" => ""]), "html", null, true);
                yield "
            </span>
          </a>
        </li>
      ";
            }
            // line 65
            yield "
      ";
            // line 67
            yield "      ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["ellipses"] ?? null), "previous", [], "any", false, false, true, 67)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 68
                yield "        <li class=\"pager__item pager__item--ellipsis\" role=\"presentation\">&hellip;</li>
      ";
            }
            // line 70
            yield "
      ";
            // line 72
            yield "      ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "pages", [], "any", false, false, true, 72));
            foreach ($context['_seq'] as $context["key"] => $context["item"]) {
                // line 73
                yield "        <li class=\"pager__item";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["current"] ?? null) == $context["key"])) ? (" pager__item--active") : ("")));
                yield " pager__item--number\">
          ";
                // line 74
                if ((($context["current"] ?? null) == $context["key"])) {
                    // line 75
                    yield "            ";
                    $context["title"] = t("Current page");
                    // line 76
                    yield "          ";
                } else {
                    // line 77
                    yield "            ";
                    $context["title"] = t("Go to page @key", ["@key" => $context["key"]]);
                    // line 78
                    yield "          ";
                }
                // line 79
                yield "          <a href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "href", [], "any", false, false, true, 79), "html", null, true);
                yield "\" title=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title"] ?? null), "html", null, true);
                yield "\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 79), "href", "title"), "addClass", [["pager__link", (((($context["current"] ?? null) == $context["key"])) ? (" is-active") : (""))]], "method", false, false, true, 79), "html", null, true);
                yield ">
            <span class=\"visually-hidden\">
              ";
                // line 81
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Page"));
                yield "
            </span>
            ";
                // line 83
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $context["key"], "html", null, true);
                yield "
          </a>
        </li>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 87
            yield "
      ";
            // line 89
            yield "      ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["ellipses"] ?? null), "next", [], "any", false, false, true, 89)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 90
                yield "        <li class=\"pager__item pager__item--ellipsis\" role=\"presentation\">&hellip;</li>
      ";
            }
            // line 92
            yield "
      ";
            // line 94
            yield "      ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, false, true, 94)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 95
                yield "        <li class=\"pager__item pager__item--action pager__item--next\">
          <a href=\"";
                // line 96
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, false, true, 96), "href", [], "any", false, false, true, 96), "html", null, true);
                yield "\" title=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Go to next page"));
                yield "\" rel=\"next\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, false, true, 96), "attributes", [], "any", false, false, true, 96), "href", "title", "rel"), "addClass", ["pager__link", "pager__link--action-link"], "method", false, false, true, 96), "html", null, true);
                yield ">
            <span class=\"visually-hidden\">";
                // line 97
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Next page"));
                yield "</span>
            <span class=\"pager__item-title pager__item-title--forward\" aria-hidden=\"true\">
              ";
                // line 99
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::replace(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, true, true, 99), "text", [], "any", true, true, true, 99)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, false, true, 99), "text", [], "any", false, false, true, 99), t("Next"))) : (t("Next"))), ["›" => ""]), "html", null, true);
                yield "
            </span>
          </a>
        </li>
      ";
            }
            // line 104
            yield "
      ";
            // line 106
            yield "      ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "last", [], "any", false, false, true, 106)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 107
                yield "        <li class=\"pager__item pager__item--action pager__item--last\">
          <a href=\"";
                // line 108
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "last", [], "any", false, false, true, 108), "href", [], "any", false, false, true, 108), "html", null, true);
                yield "\" title=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Go to last page"));
                yield "\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "last", [], "any", false, false, true, 108), "attributes", [], "any", false, false, true, 108), "href", "title"), "addClass", ["pager__link", "pager__link--action-link"], "method", false, false, true, 108), "html", null, true);
                yield ">
            <span class=\"visually-hidden\">";
                // line 109
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Last page"));
                yield "</span>
            <span class=\"pager__item-title pager__item-title--forward\" aria-hidden=\"true\">
              ";
                // line 111
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::replace(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "last", [], "any", false, true, true, 111), "text", [], "any", true, true, true, 111)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "last", [], "any", false, false, true, 111), "text", [], "any", false, false, true, 111), t("Last"))) : (t("Last"))), ["»" => ""]), "html", null, true);
                yield "
            </span>
          </a>
        </li>
      ";
            }
            // line 116
            yield "    </ul>
  </nav>
";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["items", "heading_id", "pagination_heading_level", "ellipses", "current"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "core/themes/claro/templates/pager.html.twig";
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
        return array (  251 => 116,  243 => 111,  238 => 109,  230 => 108,  227 => 107,  224 => 106,  221 => 104,  213 => 99,  208 => 97,  200 => 96,  197 => 95,  194 => 94,  191 => 92,  187 => 90,  184 => 89,  181 => 87,  171 => 83,  166 => 81,  156 => 79,  153 => 78,  150 => 77,  147 => 76,  144 => 75,  142 => 74,  137 => 73,  132 => 72,  129 => 70,  125 => 68,  122 => 67,  119 => 65,  111 => 60,  106 => 58,  98 => 57,  95 => 56,  92 => 55,  89 => 53,  81 => 48,  76 => 46,  68 => 45,  65 => 44,  62 => 43,  51 => 40,  46 => 39,  44 => 38,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{#
/**
 * @file
 * Theme override to display a pager.
 *
 * Available variables:
 * - heading_id: Pagination heading ID.
 * - pagination_heading_level: The heading level to use for the pager.
 * - items: List of pager items.
 *   The list is keyed by the following elements:
 *   - first: Item for the first page; not present on the first page of results.
 *   - previous: Item for the previous page; not present on the first page
 *     of results.
 *   - next: Item for the next page; not present on the last page of results.
 *   - last: Item for the last page; not present on the last page of results.
 *   - pages: List of pages, keyed by page number.
 *   Sub-sub elements:
 *   items.first, items.previous, items.next, items.last, and each item inside
 *   items.pages contain the following elements:
 *   - href: URL with appropriate query parameters for the item.
 *   - attributes: A keyed list of HTML attributes for the item.
 *   - text: The visible text used for the item link, such as \"‹ Previous\"
 *     or \"Next ›\".
 * - current: The page number of the current page.
 * - ellipses: If there are more pages than the quantity allows, then an
 *   ellipsis before or after the listed pages may be present.
 *   - previous: Present if the currently visible list of pages does not start
 *     at the first page.
 *   - next: Present if the visible list of pages ends before the last page.
 *
 * @see template_preprocess_pager()
 *
 * @todo review all uses of the replace() filter below in
 *   https://www.drupal.org/node/3053707 as the behavior it addresses will
 *   likely change when that issue is completed.
 */
#}
{% if items %}
  <nav class=\"pager\" role=\"navigation\" aria-labelledby=\"{{ heading_id }}\">
    <{{ pagination_heading_level }} id=\"{{ heading_id }}\" class=\"visually-hidden\">{{ 'Pagination'|t }}</{{ pagination_heading_level }}>
    <ul class=\"pager__items js-pager__items\">
      {# Print first item if we are not on the first page. #}
      {% if items.first %}
        <li class=\"pager__item pager__item--action pager__item--first\">
          <a href=\"{{ items.first.href }}\" title=\"{{ 'Go to first page'|t }}\"{{ items.first.attributes|without('href', 'title').addClass('pager__link', 'pager__link--action-link') }}>
            <span class=\"visually-hidden\">{{ 'First page'|t }}</span>
            <span class=\"pager__item-title pager__item-title--backwards\" aria-hidden=\"true\">
              {{ items.first.text|default('First'|t)|replace({'«': ''}) }}
            </span>
          </a>
        </li>
      {% endif %}

      {# Print previous item if we are not on the first page. #}
      {% if items.previous %}
        <li class=\"pager__item pager__item--action pager__item--previous\">
          <a href=\"{{ items.previous.href }}\" title=\"{{ 'Go to previous page'|t }}\" rel=\"prev\"{{ items.previous.attributes|without('href', 'title', 'rel').addClass('pager__link', 'pager__link--action-link') }}>
            <span class=\"visually-hidden\">{{ 'Previous page'|t }}</span>
            <span class=\"pager__item-title pager__item-title--backwards\" aria-hidden=\"true\">
              {{ items.previous.text|default('Previous'|t)|replace({'‹': ''}) }}
            </span>
          </a>
        </li>
      {% endif %}

      {# Add an ellipsis if there are further previous pages. #}
      {% if ellipses.previous %}
        <li class=\"pager__item pager__item--ellipsis\" role=\"presentation\">&hellip;</li>
      {% endif %}

      {# Now generate the actual pager piece. #}
      {% for key, item in items.pages %}
        <li class=\"pager__item{{ current == key ? ' pager__item--active' : '' }} pager__item--number\">
          {% if current == key %}
            {% set title = 'Current page'|t %}
          {% else %}
            {% set title = 'Go to page @key'|t({'@key': key}) %}
          {% endif %}
          <a href=\"{{ item.href }}\" title=\"{{ title }}\"{{ item.attributes|without('href', 'title').addClass(['pager__link', current == key ? ' is-active']) }}>
            <span class=\"visually-hidden\">
              {{ 'Page'|t }}
            </span>
            {{ key }}
          </a>
        </li>
      {% endfor %}

      {# Add an ellipsis if there are further next pages. #}
      {% if ellipses.next %}
        <li class=\"pager__item pager__item--ellipsis\" role=\"presentation\">&hellip;</li>
      {% endif %}

      {# Print next item if we are not on the last page. #}
      {% if items.next %}
        <li class=\"pager__item pager__item--action pager__item--next\">
          <a href=\"{{ items.next.href }}\" title=\"{{ 'Go to next page'|t }}\" rel=\"next\"{{ items.next.attributes|without('href', 'title', 'rel').addClass('pager__link', 'pager__link--action-link') }}>
            <span class=\"visually-hidden\">{{ 'Next page'|t }}</span>
            <span class=\"pager__item-title pager__item-title--forward\" aria-hidden=\"true\">
              {{ items.next.text|default('Next'|t)|replace({'›': ''}) }}
            </span>
          </a>
        </li>
      {% endif %}

      {# Print last item if we are not on the last page. #}
      {% if items.last %}
        <li class=\"pager__item pager__item--action pager__item--last\">
          <a href=\"{{ items.last.href }}\" title=\"{{ 'Go to last page'|t }}\"{{ items.last.attributes|without('href', 'title').addClass('pager__link', 'pager__link--action-link') }}>
            <span class=\"visually-hidden\">{{ 'Last page'|t }}</span>
            <span class=\"pager__item-title pager__item-title--forward\" aria-hidden=\"true\">
              {{ items.last.text|default('Last'|t)|replace({'»': ''}) }}
            </span>
          </a>
        </li>
      {% endif %}
    </ul>
  </nav>
{% endif %}
", "core/themes/claro/templates/pager.html.twig", "C:\\xampp\\htdocs\\drupal11\\web\\core\\themes\\claro\\templates\\pager.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 38, "for" => 72, "set" => 75];
        static $filters = ["escape" => 39, "t" => 40, "without" => 45, "replace" => 48, "default" => 48];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for', 'set'],
                ['escape', 't', 'without', 'replace', 'default'],
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
