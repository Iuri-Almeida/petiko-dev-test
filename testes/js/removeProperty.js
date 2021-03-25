// Implemente a função removeProperty, que recebe um objeto e o nome de uma propriedade.

// Faça o seguinte:

// Se o objeto obj tiver uma propriedade prop, a função removerá a propriedade do objeto e retornará true;
// em todos os outros casos, retorna falso.

function removeProperty(obj, prop) {

  // recebendo um valor booleano
  let hasProperty = obj.hasOwnProperty(prop)

  if (hasProperty) delete obj[prop]

  return hasProperty
}