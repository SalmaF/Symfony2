<?php

/* web3tcEchangeBundle:Echange:formulaire.html.twig */
class __TwigTemplate_47f22ad1400d3b76711712e634e86bacf6d3e8fde92e77496f69c93fcebd9211 extends Twig_Template
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
        // line 2
        echo "
<h3>Formulaire de Contrat d'étude</h3>

<div class=\"well\">
  <form method=\"post\" ";
        // line 6
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo ">
    ";
        // line 7
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
    <input type=\"submit\" class=\"btn btn-primary\" />
  </form>
</div>
    
<script src=\"http://code.jquery.com/jquery-1.8.2.min.js\"></script>

<script type=\"text/javascript\">
    \$(document).ready(function() {
        var \$container = \$('div#web3tc_echangebundle_contraetudetype_cours');

        var \$lienAjout = \$('<a href=\"#\" id=\"ajout_cours\" class=\"btn\">Ajouter un cours</a>');
        \$container.append(\$lienAjout);

        \$lienAjout.click(function(e) {
            ajouterCours(\$container);
            e.preventDefault();
            return false;
        });

        var index = \$container.find(':input').length;

        if (index == 0) {
            ajouterCours(\$container);
        } else {
            \$container.children('div').each(function() {
                ajouterLienSuppression(\$(this));
            });
        }

        function ajouterCours(\$container) {
            var \$prototype = \$(\$container.attr('data-prototype').replace(/__name__label__/g, 'Cours n°' + (index+1))
                                                                .replace(/__name__/g, index));

            ajouterLienSuppression(\$prototype);
            \$container.append(\$prototype);
            index++;
        }

        function ajouterLienSuppression(\$prototype) {
            \$lienSuppression = \$('<a href=\"#\" class=\"btn btn-danger\">Supprimer</a>');

            \$prototype.append(\$lienSuppression);

            \$lienSuppression.click(function(e) {
                \$prototype.remove();
                e.preventDefault();
                return false;
            });
        }
    });
</script>";
    }

    public function getTemplateName()
    {
        return "web3tcEchangeBundle:Echange:formulaire.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 7,  25 => 6,  19 => 2,);
    }
}
