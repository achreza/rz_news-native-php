<?php 
    class ArtikelModel{
        public $judul;
        public $header;
        public $isi;
        public $tanggal;
        public $user;
        public $tag;

        public function __construct(Array $c) {
            $this->judul = $c['judul']->judul;
            $this->header = $c['header']->header;
            $this->isi = $c['isi']->isi;
            $this->tanggal = $c['tanggal']->tanggal;
            $this->user = $c['user']->user;
            $this->tag = $c['tag']->tag;
        }

        public function getJudul(){
            return $this->judul;
        }
    }
?>