<?php
/*
  Matrix Mathematics Library for PHP
  https://helloacm.com
*/

function det2x2($a, $b, $c, $d)
{
    return ($a * $d - $b * $c);
}

/*
 * double = det3x3(  a1, a2, a3, b1, b2, b3, c1, c2, c3 )
 *
 * calculate the determinant of a 3x3 matrix
 * in the form
 *
 *     | a1,  b1,  c1 |
 *     | a2,  b2,  c2 |
 *     | a3,  b3,  c3 |
*/

function det3x3($a1, $a2, $a3, $b1, $b2, $b3, $c1, $c2, $c3)
{
    return ($a1 * det2x2( $b2, $b3, $c2, $c3 )
        - $b1 * det2x2( $a2, $a3, $c2, $c3 )
        + $c1 * det2x2( $a2, $a3, $b2, $b3 ));
}

/*
  A=| 1 y1 z1 |
    | 1 y2 z2 |
    | 1 y3 z3 |

  B=| x1 1 z1 |
    | x2 1 z2 |
    | x3 1 z3 |

  C=| x1 y1 1 |
    | x2 y2 1 |
    | x3 y3 1 |

 -D=| x1 y1 z1 |
    | x2 y2 z2 |
    | x3 y3 z3 |

*/
function ABCD(&$A, &$B, &$C, &$D, $x1, $y1, $z1, $x2, $y2, $z2, $x3, $y3, $z3)
{
    $A =  $y1 * ($z2 - $z3) + $y2 * ($z3 - $z1) + $y3 * ($z1 - $z2);
    $B =  $z1 * ($x2 - $x3) + $z2 * ($x3 - $x1) + $z3 * ($x1 - $x2);
    $C =  $x1 * ($y2 - $y3) + $x2 * ($y3 - $y1) + $x3 * ($y1 - $y2);
    $D = -$x1 * ($y2 * $z3  - $y3 *  $z2)- $x2 * ($y3 * $z1 - $y1 * $z3) - $x3 * ($y1 * $z2 - $y2 * $z1);
}