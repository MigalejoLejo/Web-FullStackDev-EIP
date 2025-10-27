<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);

/* ***********************************
    ACTIVIDAD LECCION 4
    MIGUEL A. CORREA AVILA

    SOLUCION A LA ACTIVIDAD 4
 *********************************** */

/* *****************************************
1. Función que reciba: nombre y edad, y devuelva un mensaje del tipo "Pepe tiene 43 años y es mayor de edad". 
Si la edad que recibe es menor a 18, el final del mensaje tendrá que mostrar "es menor de edad". */




# SOLUCION: 
function greet(string $name, int $age): string
{
    if ($age < 0) {
        return "una persona no puede ser menor de 0 años de edad... ni que fuera Benjamin Button... ";
    };
    $firstPart =  "$name tiene $age años de edad ";
    $secondPart = $age < 18 ? "y es menor de edad" : "y es mayor de edad";
    return ($firstPart . $secondPart);
}

#TEST: 
# Array que llama la funcion con algunos valores
$greetings = [
    greet("miguel", 24),
    greet("ana", 17),
    greet("Lucas", -4),
];

# imprimir resultados por pantalla:
echo "<h3>Resultado 1:</h3>";
foreach ($greetings as $greeting) {
?> <p> <?= $greeting ?> </p>
<?php
};
echo "<br />";




/* ******************   ***********************
2. Función que reciba un número y devuelva si es par o impar, sacando un mensaje "PAR" o "IMPAR". */

# FUNCIÓN
function getOddOrEvenFrom(int $number): string
{
    if ($number % 2 == 0) {
        return "PAR";
    } else {
        return "IMPAR";
    }
}

#TEST: 
# Array que llama la funcion con algunos valores
$testParesEImpares = [ 0, 1, 4, 3, 5, -7 ];

# imprimir resultados por pantalla:
echo "<h3>Resultado 2:</h3>";
foreach ($testParesEImpares as $number) {
?> <p> Para el numero <?= $number ?> el resultado es: <?= getOddOrEvenFrom($number) ?> </p>
<?php
};
echo "<br />";




/* *************  **************  **************
3. Función que reciba 3 números, y devuelva el máximo de los 3. */

# FUNCIÓN
function maxOfThisThree(int $a, int $b, int $c): int
{
    $result = $a;

    if ($b > $a) {
        $result = $b;
    }

    if ($c > $result) {
        $result = $c;
    }

    return $result;
}

# TEST:
# Array con numeros para testear la función
$testNumbers = [
    [1, 2, 3],
    [4, 2, 6],
    [19, 20, 18],
    [7, 5, -1],
    [1, 1, 1]
];

# imprimir resultados por pantalla:
echo "<h3>Resultado 3:</h3>";
foreach ($testNumbers as $numbers) {
?> <p> Para los numeros <?=implode(", ", $numbers)  ?> el resultado es:  <?= maxOfThisThree($numbers[0], $numbers[1], $numbers[2]) ?> </p>
<?php
};
echo "<br />";




/* **********  *************  *************  *************
4. Función que reciba un número y devuelva el factorial del número. El factorial de un número es multiplicarlo por todos los números enteros positivos que hay entre ese número y el 1. Es decir:
Factorial de 3 = 3 x 2 x 1 = 6
Factorial de 5 = 5 x 4 x 3 x 2 x 1 = 120.
CONDICIONES A TENER EN CUENTA.
- Factorial de 0 es igual a 1
- Factorial de un número negativo NO EXISTE.
La función debe tener en cuenta estas opciones. */

# FUNCIÓN
function factorial(int $number)
{
    $result = 1;
    
    if ($number < 0) {
        return "No hay Factorial para este numero.";
    } else if ($number == 0 ){
        return "1";
    } else {
        for ($i = $number; $i >= 1; $i--){
            $result = $result * $i;
        } 
        return $result;
    }
}

# TEST:
# Array con numeros para testear la función
$testNumbersForFactorial = [1,2,3,5,10,0,-5];

# imprimir resultados por pantalla:
echo "<h3>Resultado 4:</h3>";
foreach ($testNumbersForFactorial as $number) {
?> <p> Para el numero <?= $number ?> el resultado es: <?= factorial($number) ?> </p>
<?php
};
echo "<br />";




/* ********  *********  ********  *********  *********
# Dado este array de números: $numeros=[1,3,4,12,7,34,22,45,2,4,99,35, 21,55,76,29,83,22, 33]
5. Función que reciba un array de números, y devuelva el número máximo del array. (sin utilizar la función max() ) */

function findMaxValueInArray (array $numbers) : int {
    $result = $numbers[0];

    for ($i = 0; $i < count($numbers)-1; $i++){
        if ($numbers[$i+1] > $result ){
            $result = $numbers[$i+1];
        }
    }

    return $result;
}

#TEST:
# Numeros a testear:
$numeros=[1,3,4,12,7,34,22,45,2,4,99,35, 21,55,76,29,83,22, 33];

# imprimir resultados por pantalla:
echo "<h3>Resultado 4:</h3>";
echo "<p> Para los numeros ". implode(", ", $numeros) ." el resultado es:  ". findMaxValueInArray($numeros) ."</p>";
echo "<br />";






function cuenta(){

    static $a = 4;
  
    $a = $a + 1;
  
    echo $a;
  
  }


  cuenta();
  cuenta();

  cuenta();

  cuenta();



?>
