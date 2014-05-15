<?php

/* web3tcEchangeBundle:Echange:index.html.twig */
class __TwigTemplate_a5a75fd06b0f65801ac0f9bdd6c9233a7a9faa5639077d604888bc5e3bea7516 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "
    <div class=\"well\">
        <form method=\"post\" action=\"";
        // line 6
        echo $this->env->getExtension('routing')->getPath("_acceuil");
        echo "\">
            <select name=\"departement\"> 
                ";
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["departements"]) ? $context["departements"] : $this->getContext($context, "departements")));
        foreach ($context['_seq'] as $context["_key"] => $context["departement"]) {
            // line 9
            echo "                    <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["departement"]) ? $context["departement"] : $this->getContext($context, "departement")), "nom"), "html", null, true);
            echo "\"> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["departement"]) ? $context["departement"] : $this->getContext($context, "departement")), "nom"), "html", null, true);
            echo " </option>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['departement'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "            </select>
            <input type=\"submit\" class=\"btn btn-primary\" />
        </form>
    </div>

";
    }

    public function getTemplateName()
    {
        return "web3tcEchangeBundle:Echange:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 11,  44 => 9,  40 => 8,  35 => 6,  31 => 4,  28 => 3,);
    }
}
