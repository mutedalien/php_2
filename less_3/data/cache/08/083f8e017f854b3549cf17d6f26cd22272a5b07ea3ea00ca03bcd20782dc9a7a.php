<?php

/* gallery.tmpl */
class __TwigTemplate_5ada5a79ef112c713a6144851e82f1d0b0a8048ec460c0e3c8ec62ee476af4ac extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"images\">
    ";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["arrayOfPathToMiniImages"]) || array_key_exists("arrayOfPathToMiniImages", $context) ? $context["arrayOfPathToMiniImages"] : (function () { throw new Twig_Error_Runtime('Variable "arrayOfPathToMiniImages" does not exist.', 2, $this->getSourceContext()); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["arrayOfPathToMiniImage"]) {
            // line 3
            echo "        <a target=\"_blank\" href=\"controllers/image.php\">
            <img src=\"";
            // line 4
            echo twig_escape_filter($this->env, $context["arrayOfPathToMiniImage"], "html", null, true);
            echo "\" class=\"mini_image\" />
        </a>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['arrayOfPathToMiniImage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 7
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "gallery.tmpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 7,  29 => 4,  26 => 3,  22 => 2,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "gallery.tmpl", "/home/artem/Dropbox/WebMaster/GeekBrains/php-2/php-2.loc/3/views/gallery.tmpl");
    }
}
