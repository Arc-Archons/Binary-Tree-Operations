<?php echo "Binary Tree Operation"; ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
<style type="text/css" src='style.css'></style>
</head>
<body>
<div class="tree">
  <ul>
  <li>
    <a href="#">Parent</a>
    <ul>
      <li>
        <a href="#">User L</a>
        <ul>
          <li>
            <a href="#">User LL</a>
          </li><li>
            <a href="#">User LR</a>
            <ul>
              <li>
                <a href="#">User LRL</a>
              </li><li>
                <a href="#">User LRR</a>
              </li>
            </ul>
          </li>
        </ul>
      </li><li>
        <a href="#">Child R</a>
        <ul>
          <li>
            <a href="#">Child RL</a>
            <ul>
              <li>
                <a href="#">Child RLL</a>
              </li>
            </ul>
          </li><li>
            <a href="#">Child RR</a>
          </li>
        </ul>
      </li>
    </ul>
  </li>
</ul>
<?php
class Node // Node of a tree
{
    public $data;
    public $leftChild;
    public $rightChild;
     
    public function __construct() {
        $this->data = null;
        $this->leftChild = null;
        $this->leftChild = null;
    }
}
 
class BruteForceAlgebraicTree
{
    private $_root; // pointer to root of a tree
     
    public function __construct() 
    {                
        $this->_prepareTree();
    }
     
    /**
     * Add algebraic expression elements to tree (according to our algebraic expression)
     * 
     * P.S. brute force
     */
    private function _prepareTree()
    {
        // the root
        $this->_root = new Node();
        $this->_root->data = "Parent";
         
        // left subtree
        $this->_addNode("Child User L", "L");
        $this->_addNode("Child User LL", "LL");
        $this->_addNode("Child User LR", "LR");
        $this->_addNode("Child User LRL", "LRL");
        $this->_addNode("Child User LRR", "LRR");
         
        // right subtree
        $this->_addNode("Child User R", "R");
         
        $this->_addNode("Child User RL", "RL");
         
        $this->_addNode("Child User RLL", "RLL");

        $this->_addNode("Child User RR", "RR");
    }
     
    /**
     * Add node to tree by given path
     * 
     * @param string $data Node's data
     * @param string $location Path where new node should be inserted
     */
    private function _addNode($data, $location)
    {
        $current = $this->_root;
         
        $path = str_split($location);
        foreach ($path as $direction) {
            if ($direction == 'L') {
                if (!isset($current->leftChild)) {
                    $current->leftChild = new Node();                    
                }
                $current = $current->leftChild;
            } else {
                if (!isset($current->rightChild)) {
                    $current->rightChild = new Node();               
                }
                $current = $current->rightChild;
            }                        
        }   
         
        $current->data = $data;
    }
     
    /**
     * Traversing tree nodes
     * 
     * @param int $type Type of traverse
     */
    public function traverse($type)
    {
        switch ($type) {
            case 1:
                ?> <br><b><?php echo "Up to bottom traverse: ";?></b><br><?php 
                $this->_preOrder($this->_root);
                break;
            case 2:
                ?> <hr><br><b><?php echo "Left to right traverse: ";?></b><br><?php
                $this->_inOrder($this->_root);
                break;
            case 3:
                ?> <hr><br><b> <?php echo "Bottom to top traverse: ";?></b><br><?php
                $this->_postOrder($this->_root);
                break;
        }
    }
     
    /**
     * Up to bottom traverse
     * 
     * @param Node $localRoot Pointer to tree's root
     */
    private function _preOrder(Node $localRoot = null)
    {
        if ($localRoot != null) {
            echo $localRoot->data . " "; ?>
            <br>
            <?php 
            $this->_preOrder($localRoot->leftChild);
            $this->_preOrder($localRoot->rightChild);
        }
    }   
 
    /**
     * Left to right traverse
     * 
     * @param Node $localRoot Pointer to tree's root
     */   
    private function _inOrder(Node $localRoot = null) 
    {
        if ($localRoot != null) {
            // traverse the left tree
            $this->_inOrder($localRoot->leftChild); 
            // visit the root
            echo $localRoot->data . " ";
            ?>
            <br>
            <?php  
            // traverse the right tree
            $this->_inOrder($localRoot->rightChild); 
        }
    }
 
    /**
     * Bottom to top traverse
     * 
     * @param Node $localRoot Pointer to tree's root
     */   
    private function _postOrder(Node $localRoot = null) 
    {
        if ($localRoot != null) {
            $this->_postOrder($localRoot->leftChild);
            $this->_postOrder($localRoot->rightChild);
            echo $localRoot->data . " ";
            ?>
            <br>
            <?php 
        }
    }
}
 
$Tree = new BruteForceAlgebraicTree();
echo $Tree->traverse(1);
echo $Tree->traverse(2);
echo $Tree->traverse(3);
?>
</body>
</html>
