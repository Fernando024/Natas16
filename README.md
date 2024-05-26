# Natas16

La vulnerabilidad se trata de una inyeccion no slq con lo que a travez de un formulario se realizan intrucciones o comprobaciones como lo es este caso indicando 
la ruta donde sabemos que se encuentra la contraseña y atraves de fuerza bruta ir conociendo primeramente los caracteres que contiene y despues de conocer los caracteres 
saber si se ecnentran en la posicion correcta ,con esto basta un breve momento para que se calcule la contraseña del usuario ,a diferencia del antererior nivel existen 
caracteres bloqueados que no perimten ejecutemos este tipo de intrucciones pero al ser sistemas linux pueden realizar acciones a traves de intrucciones en bash con lo que se ocupan caracteres como ^ () $ que no se encuentran bloqueados y que con ellos precisamente se logra obtner la contraseña 

Una de las formas de mitigarla es creando solo una lista blanca con los caracteres a utilizar si solo se quiere que se consulte un diccionario solo las letras deberan de ser permitidas y si acaso el espacio en blanco pero todos los demas caraceteres con lo que se pueda ejecutar una intruccion seran rechazados y no se podra llevar a cabo ninguna accion maliciosa 
A demas otra manera de abordar este problema es añadir mas carateres especiales a las contraseñas y hacerlas mas largas con ello se aumenta considerablemente el tiempo 
que un ataque de fuerza bruta pueda obtener la contraseña seria posible pero tardaria mucho tiempo que tecnicamente no sera suficiente para poder hacer uso de ella 
