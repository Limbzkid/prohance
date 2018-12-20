<?php

/* themes/prohance/templates/page.html.twig */
class __TwigTemplate_76e03cb19f04cdb76aa7b4c986856736c4ec39b4df2358dae6177aa5b83f704a extends Twig_Template
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
        $tags = array();
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array(),
                array(),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 1
        echo "<!-- Popup contact us Address Starts -->
<div class=\"overlay-contact\"></div>
<div class=\"pop-contact-wrp\">
\t<div class=\"head-txt\">
\t\t<h2>Address</h2>
\t\t<span class=\"cross-sign\">?</span>
\t</div>
\t<div class=\"wrapper\">
\t\t";
        // line 9
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "message", array()), "html", null, true));
        echo "
\t</div>  
</div>
<!-- Popup contact us Address Ends -->
<header>
\t<div class=\"container-flow\">
\t\t<div class=\"wrapper flex-wrp\">
\t\t\t<div class=\"pro-logo\">
\t\t\t\t";
        // line 17
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "logo", array()), "html", null, true));
        echo "
\t\t\t</div>
\t\t\t<div class=\"mob-menu\">
\t\t\t\t<span></span>
\t\t\t</div>
\t\t\t<nav>
\t\t\t\t<ul class=\"flex-wrp main-menu\">
\t\t\t\t\t";
        // line 24
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "menu_left", array()), "html", null, true));
        echo "
\t\t\t\t\t";
        // line 25
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "menu_right", array()), "html", null, true));
        echo "
\t\t\t\t</ul>   
\t\t\t</nav>
\t\t</div>
\t</div>
</header>


<section class=\"terms\">
  <div class=\"container\">
    <div class=\"wrapper\">
\t\t\t";
        // line 36
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "content", array()), "html", null, true));
        echo "  
\t\t</div>
\t</div>
</section>

<footer>
\t<div class=\"container-flow\">
\t\t<div class=\"wrapper flex-wrp\">
\t\t\t<div class=\"copy flex-wrp\">
\t\t\t\t<p class=\"copyright\">Copyright &copy; Sun Pharmaceutical Industries Ltd. </p>
\t\t\t\t<ul class=\"flex-wrp\">
\t\t\t\t\t";
        // line 47
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "footer", array()), "html", null, true));
        echo "
\t\t\t\t</ul>
\t\t\t</div>
\t\t\t<div class=\"subs-wrp\">
\t\t\t\t<ul class=\"flex-wrp\">
\t\t\t\t\t<li><a href=\"javascript:;\">subscribe</a></li>
\t\t\t\t\t<li><a href=\"javascript:;\">unbscribe</a></li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t\t<div class=\"social-wrp\">
\t\t\t\t<ul class=\"flex-wrp\">
\t\t\t\t\t<li><a href=\"https://www.facebook.com/Sun-Pharma-170795602978664/\" target=\"_blank\"><img src=\"/";
        // line 58
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["directory"] ?? null), "html", null, true));
        echo "/images/fb.png\" alt=\"fb\"></a></li>
\t\t\t\t\t<li><a href=\"https://twitter.com/SunPharma_live\" target=\"_blank\"><img src=\"/";
        // line 59
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["directory"] ?? null), "html", null, true));
        echo "/images/tw.png\" alt=\"tw\"></a></li>
\t\t\t\t\t<li><a href=\"https://www.youtube.com/channel/UCdkyfWmDFAaUA5P8GD_LVdQ\" target=\"_blank\"><img src=\"/";
        // line 60
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["directory"] ?? null), "html", null, true));
        echo "/images/yt.png\" alt=\"yt\"></a></li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t</div>
\t</div>
</footer>
";
    }

    public function getTemplateName()
    {
        return "themes/prohance/templates/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 60,  124 => 59,  120 => 58,  106 => 47,  92 => 36,  78 => 25,  74 => 24,  64 => 17,  53 => 9,  43 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themes/prohance/templates/page.html.twig", "/var/www/html/prohance/web/themes/prohance/templates/page.html.twig");
    }
}
