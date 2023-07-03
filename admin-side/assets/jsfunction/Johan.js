function extractJsonToPieFormProduct(json_produits) 
{
  var nomProduits = [];
  var maximizes = [];
  var colors = [];
  var borderColors = [];

  for (var i = 0; i < json_produits.length; i++)
  {
    nomProduits.push(json_produits[i].nomproduit);
    maximizes.push(json_produits[i].maximize);

    // Générer une couleur aléatoire
    var color = getRandomColor();

    // Générer une couleur avec une opacité réduite pour la couleur de fond
    var backgroundColor = reduceOpacity(color, 0.3); // Ajustez le niveau d'opacité ici (0.6 = 60% d'opacité)
    colors.push(backgroundColor);

    // Générer une couleur plus opaque pour la bordure
    var borderColor = darkenColor(color, 40); // Ajustez le pourcentage d'opacité ici (40 = 40% plus opaque)
    borderColors.push(borderColor);
  }

  return {
    nomProduits: nomProduits,
    maximizes: maximizes,
    colors: colors,
    borderColors: borderColors
  };
}

// Fonction pour générer une couleur aléatoire au format hexadécimal
function getRandomColor() 
{
  var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++)
  {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}

// Fonction pour réduire l'opacité d'une couleur
function reduceOpacity(color, opacity) 
{
  var alpha = Math.round(opacity * 255);
  var hexAlpha = alpha.toString(16).toUpperCase();
  if (hexAlpha.length < 2) {
    hexAlpha = '0' + hexAlpha;
  }
  var updatedColor = color + hexAlpha;
  return updatedColor;
}

// Fonction pour rendre une couleur plus opaque
function darkenColor(color, percent)
{
  var num = parseInt(color.slice(1), 16);
  var amt = Math.round(2.55 * percent);
  var R = (num >> 16) - amt;
  var G = (num >> 8 & 0x00FF) - amt;
  var B = (num & 0x0000FF) - amt;
  var newColor = '#' + (0x1000000 + (R < 255 ? (R < 1 ? 0 : R) : 255) * 0x10000 + (G < 255 ? (G < 1 ? 0 : G) : 255) * 0x100 + (B < 255 ? (B < 1 ? 0 : B) : 255)).toString(16).slice(1);
  return newColor;
}
