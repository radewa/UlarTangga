<!DOCTYPE html>
<?php
		abstract class Pemain
		{
			protected $otomatis;
			protected $nama;
			protected $jalan;
			protected $posisi;
			
			abstract public function getOtomatis();
			abstract public function getNama();
			abstract public function getJalan();
			abstract public function setJalan($masukan);
			abstract public function setPosisi($posisi);
			abstract public function getPosisi();
		}
		
		class Manusia extends Pemain
		{
			public function __construct($nama)
			{
				$this->otomatis=false;
				$this->nama=$nama;
				$this->jalan=true;
				$this->posisi=100;
			}
			
			public function getOtomatis()
			{
				return $this->otomatis;
			}
			
			public function getNama()
			{
				return $this->nama;
			}
			
			public function getJalan()
			{
				return $this->jalan;
			}
			
			public function setJalan($masukan)
			{
				$this->jalan=$masukan;
			}
			
			public function getPosisi()
			{
				return $this->posisi;
			}
			
			public function setPosisi($masukan)
			{
				$this->posisi=$masukan;
			}
		}
		
		class Komputer extends Pemain
		{
			public function __construct($nama)
			{
				$this->otomatis=true;
				$this->nama=$nama;
				$this->jalan=true;
				$this->posisi=100;
			}
			
			public function getOtomatis()
			{
				return $this->otomatis;
			}
			
			public function getNama()
			{
				return $this->nama;
			}
			
			public function getJalan()
			{
				return $this->jalan;
			}
			
			public function setJalan($masukan)
			{
				$this->jalan=$masukan;
			}
			
			public function getPosisi()
			{
				return $this->posisi;
			}
			
			public function setPosisi($masukan)
			{
				$this->posisi=$masukan;
			}
		}
		
		
		
		class Dadu
		{
			public function lemparDadu()
			{
				return rand(1,6);
			}
		}
		
		class Board
		{
			private $tangga;
			private $ular;
			private $isi;
			
			public function __construct($index)
			{
				$this->tangga=null;
				$this->ular=null;
				$this->isi=""+(100-$index)+" ";
			}
			
			public function getTangga()
			{
				return $this->tangga;
			}
			
			public function getUlar()
			{
				return $this->ular;
			}
			
			public function getIsi()
			{
				return $this->isi;
			}
			
			public function setTangga($koordinat)
			{
				$this->tangga=new Tangga($koordinat);
			}
			
			public function setUlar($koordinat)
			{
				$this->ular=new Ular($koordinat);
			}
			
			public function setIsi($masukan)
			{
				$this->isi=$masukan;
			}
		}
		
		
		
		class Podium
		{
			private $juara;
			private $index;
			
			function __construct()
			{
				$this->juara=array(null,null);
				$this->index=0;
			}
			
			public function finish($pemain)
			{
				$this->juara[$this->index]=$pemain;
				$this->index++;
			}
			
			public function getJuara($index)
			{
				return $this->juara[$index];
			}
		}
		
		class Tangga
		{
			private $from;
			private $target;
			
			public function __construct($koordinat)
			{
				$this->buatTangga($koordinat);
			}
			
			private function buatTangga($koordinat)
			{
				$this->from=$koordinat;
				$barisTarget=rand(0,($this->from/10)-1);
				$kolomTarget=rand(0,9);
				$this->target=$barisTarget*10+$kolomTarget;
			}
			
			public function getFrom()
			{
				return $this->from;
			}
			
			public function getTarget()
			{
				return $this->target;
			}
		}
		
		class Ular
		{
			private $from;
			private $target;
			
			public function __construct($koordinat)
			{
				$this->buatUlar($koordinat);
			}
			
			private function buatUlar($koordinat)
			{
				$this->from=$koordinat;
				$barisTarget=rand(($this->from/10)+1,9);
				$kolomTarget=rand(0,9);
				$this->target=$barisTarget*10+$kolomTarget;
			}
			
			public function getFrom()
			{
				return $this->from;
			}
			
			public function getTarget()
			{
				return $this->target;
			}
		}
		
		
		
		class Main
		{
			private $papan;
			private $dadu;
			private $player1;
			private $player2;
			private $podium;
			
			public function __construct($kondisi)
			{
				$this->papan= array(
					array(new Board(0),new Board(1), new Board(2), new Board(3), new Board(4), new Board(5), new Board(6), new Board(7), new Board(8), new Board(9)),
					array(new Board(10),new Board(11), new Board(12), new Board(13), new Board(14), new Board(15), new Board(16), new Board(17), new Board(18), new Board(19)),
					array(new Board(20),new Board(21), new Board(22), new Board(23), new Board(24), new Board(25), new Board(26), new Board(27), new Board(28), new Board(29)),
					array(new Board(30),new Board(31), new Board(32), new Board(33), new Board(34), new Board(35), new Board(36), new Board(37), new Board(38), new Board(39)),
					array(new Board(40),new Board(41), new Board(42), new Board(43), new Board(44), new Board(45), new Board(46), new Board(47), new Board(48), new Board(49)),
					array(new Board(50),new Board(51), new Board(52), new Board(53), new Board(54), new Board(55), new Board(56), new Board(57), new Board(58), new Board(59)),
					array(new Board(60),new Board(61), new Board(62), new Board(63), new Board(64), new Board(65), new Board(66), new Board(67), new Board(68), new Board(69)),
					array(new Board(70),new Board(71), new Board(72), new Board(73), new Board(74), new Board(75), new Board(76), new Board(77), new Board(78), new Board(79)),
					array(new Board(80),new Board(81), new Board(82), new Board(83), new Board(84), new Board(85), new Board(86), new Board(87), new Board(88), new Board(89)),
					array(new Board(90),new Board(91), new Board(92), new Board(93), new Board(94), new Board(95), new Board(96), new Board(97), new Board(98), new Board(99))
				);
				$this->dadu=new Dadu();
				$this->podium=new Podium();
				$this->newGame($kondisi);
			}
			
			private function newGame($kondisi)
			{
				$this->player1=new Manusia("P1");
				if($kondisi==1)
				{
					$this->player2=new Manusia("P2");
				}
				else
				{
					$this->player2=new Komputer("COM");
				}
				
				for($i=0;$i<rand(1,5);$i++)
				{
					$koordinat=rand(10,99);
					while($this->papan[$koordinat/10][$koordinat%10]->getTangga()!=null and $this->papan[$koordinat/10][$koordinat%10]->getUlar()!=null)
					{
						$koordinat=rand(10,99);
					}
					$this->papan[$koordinat/10][$koordinat%10]->setTangga($koordinat);
					$this->papan[$koordinat/10][$koordinat%10]->setIsi("+  ");
					echo "Tangga di papan ke: ".(100-$this->papan[$koordinat/10][$koordinat%10]->getTangga()->getFrom())." naik sampai papan ke: ".(100-$this->papan[$koordinat/10][$koordinat%10]->getTangga()->getTarget())."<br/>";
				}
				echo "<br/><br/>";
				for($i=0;$i<rand(1,5);$i++)
				{
					$koordinat=rand(1,89);
					while($this->papan[$koordinat/10][$koordinat%10]->getTangga()!=null and $this->papan[$koordinat/10][$koordinat%10]->getUlar()!=null)
					{
						$koordinat=rand(1,89);
					}
					$this->papan[$koordinat/10][$koordinat%10]->setUlar($koordinat);
					$this->papan[$koordinat/10][$koordinat%10]->setIsi("-  ");
					echo "Ular di papan ke: ".(100-$this->papan[$koordinat/10][$koordinat%10]->getUlar()->getFrom())." turun sampai papan ke: ".(100-$this->papan[$koordinat/10][$koordinat%10]->getUlar()->getTarget())."<br/>";
				}
				echo"<br/><br/>";
			}
			
			public function play()
			{
					$langkah=$this->dadu->lemparDadu();
					if($this->player1!=null and $this->player1->getJalan()==true)
					{
						if($this->player1->getPosisi()!=100)
						{
							$this->papan[$this->player1->getPosisi()/10][$this->player1->getPosisi()%10]->setIsi(100-$this->player1->getPosisi()+" ");
						}
						
						if($this->player1->getPosisi()-$langkah>=0)
						{
							$this->player1->setPosisi($this->player1->getPosisi()-$langkah);
							echo $this->player1->getNama()." jalan sebanyak ".$langkah."<br/>";
						}
						else
						{
							$this->player1->setPosisi(($this->player1->getPosisi()-$langkah)*-1);
							echo $this->player1->getNama()." jalan sebanyak $langkah lalu mundur sebanyak ".$this->player1->getPosisi()."<br/>";
						}
						
						if($this->papan[$this->player1->getPosisi()/10][$this->player1->getPosisi()%10]->getTangga()!=null)
						{
							echo $this->player1->getNama()." naik Tangga ke papan nomor ".(100-$this->papan[$this->player1->getPosisi()/10][$this->player1->getPosisi()%10]->getTangga()->getTarget())."<br/>";
							$this->player1->setPosisi($this->papan[$this->player1->getPosisi()/10][$this->player1->getPosisi()%10]->getTangga()->getTarget());
						}
						else if($this->papan[$this->player1->getPosisi()/10][$this->player1->getPosisi()%10]->getUlar()!=null)
						{
							echo $this->player1->getNama()." menginjak ular lalu turun ke ".(100-$this->papan[$this->player1->getPosisi()/10][$this->player1->getPosisi()%10]->getUlar()->getTarget())."<br/>";
							$this->player1->setPosisi($this->papan[$this->player1->getPosisi()/10][$this->player1->getPosisi()%10]->getUlar()->getTarget());
						}
						$this->papan[$this->player1->getPosisi()/10][$this->player1->getPosisi()%10]->setIsi($this->player1->getNama()." ");
						
						if($this->player2==null||$langkah==6)
						{
							$this->player1->setJalan(true);
						}
						else
						{
							$this->player1->setJalan(false);
							$this->player2->setJalan(true);
						}
						
						
					}
					else if($this->player2!=null and $this->player2->getJalan()==true)
					{
						if($this->player2->getPosisi()!=100)
						{
							$this->papan[$this->player2->getPosisi()/10][$this->player2->getPosisi()%10]->setIsi(100-$this->player2->getPosisi()+" ");
						}
						
						if($this->player2->getPosisi()-$langkah>=0)
						{
							$this->player2->setPosisi($this->player2->getPosisi()-$langkah);
							echo $this->player2->getNama()." jalan sebanyak ".$langkah."<br/>";
						}
						else
						{
							$this->player2->setPosisi(($this->player2->getPosisi()-$langkah)*-1);
							echo $this->player2->getNama()." jalan sebanyak $langkah lalu mundur sebanyak ".$this->player2->getPosisi()."<br/>";
						}
						
						if($this->papan[$this->player2->getPosisi()/10][$this->player2->getPosisi()%10]->getTangga()!=null)
						{
							echo $this->player2->getNama()." naik Tangga ke papan nomor ".(100-$this->papan[$this->player2->getPosisi()/10][$this->player2->getPosisi()%10]->getTangga()->getTarget())."<br/>";
							$this->player2->setPosisi($this->papan[$this->player2->getPosisi()/10][$this->player2->getPosisi()%10]->getTangga()->getTarget());
						}
						else if($this->papan[$this->player2->getPosisi()/10][$this->player2->getPosisi()%10]->getUlar()!=null)
						{
							echo $this->player2->getNama()." menginjak ular lalu turun ke ".(100-$this->papan[$this->player2->getPosisi()/10][$this->player2->getPosisi()%10]->getUlar()->getTarget())."<br/>";
							$this->player2->setPosisi($this->papan[$this->player2->getPosisi()/10][$this->player2->getPosisi()%10]->getUlar()->getTarget());
						}
						$this->papan[$this->player2->getPosisi()/10][$this->player2->getPosisi()%10]->setIsi($this->player2->getNama()." ");
						
						if($this->player1==null||$langkah==6)
						{
							$this->player2->setJalan(true);
						}
						else
						{
							$this->player2->setJalan(false);
							$this->player1->setJalan(true);
						}
					}
					
					if($this->player1!=null and $this->player1->getPosisi()==0)
					{
						echo $this->player1->getNama()." Finish <br/>";
						$this->podium->finish($this->player1);
						$this->player1=null;
						if($this->player2!=null)
						{
							$this->player2->setJalan(true);
						}
					}
					else if($this->player2!=null and $this->player2->getPosisi()==0)
					{
						echo $this->player2->getNama()." Finish <br/>";
						$this->podium->finish($this->player2);
						$this->player2=null;
						if($this->player1!=null)
						{
							$this->player1->setJalan(true);
						}
					}
				$this->printPapan();
			}
			
			public function mainkan()
			{
				while($this->player1!=null or $this->player2!=null)
				{
					$this->play();
				}
			}
			
			public function printPapan()
			{
				for($i=0;$i<10;$i++)
				{
					for($j=0;$j<10;$j++)
					{
						echo $this->papan[$i][$j]->getIsi()." ";
					}
					echo " <br/>";
				}
				echo "<br/>";
				echo "<br/>";
			}
			
			public function getPlayer1()
			{
				return $this->player1;
			}
			
			public function getPlayer2()
			{
				return $this->player2;
			}
		}
		if($_SERVER['REQUEST_METHOD']=='POST'){
			if(isset($_POST['jenis'])){
				if($_POST['jenis']==1){
					$angga=new Main(1);
					$angga->mainkan();
				}else{
					$angga=new Main(2);
					$angga->mainkan();
				}
			}
		}
		
	?>
