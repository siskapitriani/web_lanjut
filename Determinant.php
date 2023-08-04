<?php
class Determinant {

    private $matrix;

    function __construct(array $matrix){

        if(array_column($matrix, 0) == null || count(array_column($matrix, 0)) != count($matrix[0]))
            throw new Exception("Error: This is not a square matrix", 1);

        $this->matrix = $matrix;
    }

    /**
     *
     * @return $determiant the determinant of square matrix
     *
     */

    public function getDeterminant(){

        if(count($this->matrix) == 1)
            return $this->matrix[0][0];

        return $this->sarrus();

    }

    /**
     *
     * @return array $matrix - a square matrix with the order indicated
     * @param int $order has to be integer
     *
     */

    public function matrixReduce(int $order){

        if(count($this->matrix) <= $order) return $this->matrix;
        $matrix = $this->matrix;

        while(count($matrix) > $order)
            $matrix = $this->chio($matrix);

        return $matrix;

    }

    /**
     *
     *	if the matrix order is greater than 3, the matrixReduce function will be called
     *	@return $determinant - result of calculating the determinant
     *
     *	result is like this ...
     *	($matrix[0][0] * $matrix[1][1] * $matrix[2][2]) +
     *	($matrix[1][0] * $matrix[2][1] * $matrix[3][2]) +
     *	($matrix[2][0] * $matrix[3][1] * $matrix[4][2]) -
     *
     *	($matrix[0][2] * $matrix[1][1] * $matrix[2][0]) -
     *	($matrix[1][2] * $matrix[2][1] * $matrix[3][0]) -
     *	($matrix[2][2] * $matrix[3][1] * $matrix[4][0])
     *
     */

    private function sarrus(){

        $matrix = $this->matrix;

        if(count($matrix) == 2)
            return ($matrix[0][0] * $matrix[1][1]) - ($matrix[0][1] * $matrix[1][0]);

        if(count($matrix) > 3)
            $matrix = $this->matrixReduce(3);

        $matrix[3] = $matrix[0];
        $matrix[4] = $matrix[1];

        $determinant = 0;
        for($x = 0; $x < 3; $x++)
            $determinant += $matrix[$x][0] * $matrix[$x + 1][1] * $matrix[$x + 2][2];
        for($x = 0; $x < 3; $x++)
            $determinant -= $matrix[$x][2] * $matrix[$x + 1][1] * $matrix[$x + 2][0];

        return $determinant;

    }

    /**
     *
     * reduce an matrix order level
     * @return array $matrix - values of new matrix
     * @param array $matrix - is matrix for reduce level
     *
     */

    private function chio(array $matrix){

        if(($elem = $this->getElement($matrix)) === false){
            $matrix[1] = $this->jacobi([$matrix[0], $matrix[1]]);
            $elem[0] = 1;
            $elem[1] = 0;
        }

        $order = count($matrix);
        $col = array_column($matrix, $elem[1]);
        $row = $matrix[$elem[0]];
        $newMatrix = [];

        $m = ($elem[0] + $elem[1] + 2) % 2 == 0 ? 1 : -1;

        for($x = 0; $x < $order; $x++){
            if($x == $elem[0]) continue;
            for($y = 0; $y < $order; $y++){
                if($y == $elem[1]) continue;
                $newMatrix[$x][] = ($matrix[$x][$y] - ($col[$x] * $row[$y])) * $m;
            }
        }

        return array_values($newMatrix);

    }

    /**
     *
     * @return array $matrix[1] - elements of matrix[1]
     * @param array $matrix - parts of matrix -> matrix[ matrix[0], matrix[1] ]
     *
     */

    private function jacobi(array $matrix){

        $t = count($matrix[0]);
        $m = $matrix[1][0] / $matrix[0][0];
        for ($y=0; $y < $t; $y++)
            $matrix[1][$y] = ($m * $matrix[0][$y]) + $matrix[1][$y];

        return $matrix[1];
    }

    /**
     *
     * @return false [$posx, $posy] - the first element found with value 1
     * @return boolean false - if element 1 value is not found
     * @param array $matrix - for analysis of the value sought
     *
     */

    private function getElement(array $matrix){

        foreach ($matrix as $kl => $row) {
            foreach ($row as $kc => $val) {
                if($val == 1) return [$kl,$kc];
            }
        }
        return false;

    }

}