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

/* core/themes/claro/templates/classy/user/username.html.twig */
class __TwigTemplate_09bbe985ef2b7c6806326b0563784089 extends Template
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
        // line 25
        if ((($tmp = ($context["link_path"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 26
            yield "<a";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["username"], "method", false, false, true, 26), "html", null, true);
            yield ">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["name"] ?? null), "html", null, true);
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["extra"] ?? null), "html", null, true);
            yield "</a>";
        } else {
            // line 28
            yield "<span";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["attributes"] ?? null), "html", null, true);
            yield ">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["name"] ?? null), "html", null, true);
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["extra"] ?? null), "html", null, true);
            yield "</span>";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["link_path", "attributes", "name", "extra"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "core/themes/claro/templates/classy/user/username.html.twig";
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
        return array (  54 => 28,  46 => 26,  44 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{#
/**
 * @file
 * Theme override for displaying a username.
 *
 * Available variables:
 * - account: The full account information for the user.
 * - uid: The user ID, or zero if not a user. As used in anonymous comments.
 * - name: The user's name, sanitized, and optionally truncated.
 * - name_raw: The user's name, un-truncated.
 * - truncated: Whether the user's name was truncated.
 * - extra: Additional text to append to the user's name, sanitized.
 * - profile_access: Whether the current user has permission to access this
     users profile page.
 * - link_path: The path or URL of the user's profile page, home page,
 *   or other desired page to link to for more information about the user.
 * - homepage: (optional) The home page of the account, only set for non users.
 * - link_options: Options to set on the \\Drupal\\Core\\Url object if linking the
 *   user's name to the user's page.
 * - attributes: HTML attributes for the containing element.
 *
 * @see template_preprocess_username()
 */
#}
{% if link_path -%}
  <a{{ attributes.addClass('username') }}>{{ name }}{{ extra }}</a>
{%- else -%}
  <span{{ attributes }}>{{ name }}{{ extra }}</span>
{%- endif -%}
", "core/themes/claro/templates/classy/user/username.html.twig", "C:\\xampp\\htdocs\\drupal11\\web\\core\\themes\\claro\\templates\\classy\\user\\username.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 25];
        static $filters = ["escape" => 26];
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
