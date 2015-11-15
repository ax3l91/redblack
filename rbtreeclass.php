<?php
class RbNode{
		const color_black=0;
		const color_red=1;
		public $color=null;
		public $key=null;
		public $left=null;
		public $right=null;
		public $parent=null;
}

class RbTree{
	public $root=null;
	public $nil=null;
	protected $DEBUG = false;
	
	public function __construct()//nill constructor??
	{
		$this->nil = new RbNode();
		$this->nil->left = $this->nil->right = $this->nil->parent = $this->nil;
		$this->root = $this->nil;
	}
	
	public function setDebug( $debug )
	{
		if ( !is_bool( $debug ) )
			throw new InvalidArgumentException( __METHOD__.'() debug must be a boolean' );
			$this->DEBUG = $debug;
	}
	
   protected function binaryTreeInsert( RbTree $tree, RbNode $z )
    {
        $nil = $tree->nil;
        // Even though at instantiation, these are set to nil - make sure they still are ;-)
        $z->left = $z->right = $nil;
        $y = $tree->root;
        $x = $tree->root->left;
        while ( $x !== $nil )
        {
            $y = $x;
            if ( $this->compare( $x->key, $z->key ) === 1 )
            {
                $x = $x->left;
            }
            else
            {
            	print "hello from if";
                $x = $x->right;
            }
        }
        $z->parent = $y;
        if (  $y === $nil  )
        {
        	echo "making new root";
            $tree->root=$z;
        }
        else if ($z->key<$x->key) $y->left=$z;
        else  $y->right = $z;
        if ( $this->DEBUG )
        {
            assert( $tree->nil->color === RbNode::COLOR_BLACK );
        }
    }
	
	public function isNil( RbTree $tree, RbNode $x )
	{
		return ( $tree->nil === $x );
	}
	public function working(){
		return ("HELLOOOOO");
	}
	public function insert(RbTree $tree,RbNode $x){
		$this->binaryTreeInsert( $tree, $x );
	}
	public function printing(){
		$value=$this->root->key;
		echo $this->root->key;
		echo $this->root->left->key;
		if ($this->root->left==$this->nil){
			echo "left is nil";
		}
		echo $this->root->right->key;
		if ($this->root->right==$this->nil){
			echo "right is nil";
		}
	}
	
	protected function compare( $key1, $key2 )
	{
		if ( !is_scalar( $key1 ) || is_bool( $key1 ) || !is_scalar( $key2 ) || is_bool( $key2 ) )
			throw new InvalidArgumentException( __METHOD__.'() keys must be a string or numeric' );
			$returnValue = null;
			switch ( true )
			{
				case ( is_numeric( $key1 ) && is_numeric( $key2 ) ):
					if ( $key1 > $key2 )
					{
						$returnValue = 1;
					}
					else
					{
						$returnValue = ( $key1 === $key2 ) ? 0 : -1;
					}
					return $returnValue;
					// Add more cases here...
			}
			// Unfortunately if either of the keys is not a numeric, then
			// the most logical comparison method is by their string values
			$returnValue = strcmp( "$key1", "$key2" );
			// make sure these are the exact return values, even though PHP seems to always return
			// -1,0,1 but the documentation does not explicity say it
			if ( $returnValue > 0 )
				return 1;
				if ( $returnValue < 0 )
					return -1;
					return 0;
	}
}

// define variables and set to empty values
$name = "";
$tree=new RbTree();
?>