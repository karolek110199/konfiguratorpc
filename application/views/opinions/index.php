<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section id="content" class="main-section">
    <div class="container">

        <div class="center">
            <?php if(isset($success)): ?>
                <h3><?= $success ?></h3>
            <?php endif; ?>
        </div>

        <h3 class="center">Opinie klientów<span class="underline"></span></h3>

        <?php foreach($opinions as $opinion): ?>
        <div class="opinion-box">
            <div class="opinion-header">
                <span class="name"><?= $opinion->name ?></span><span class="date"><?= date('d.m.Y', $opinion->added) ?></span>
            </div>
            <div class="opinion-content">
                <p><?= $opinion->content ?></p>
                <?php for($i = 0; $i < $opinion->rate; $i++): ?>
                    <i class="material-icons">star</i>
                <?php endfor; ?>
            </div>
        </div>
        <?php endforeach; ?>

       <div class="center"><a class="button" href="opinions/add">DODAJ OPINIĘ</a></div>
        
    </div>
</section>

<?php $this->load->view('parts/counter'); ?>

<?php $this->load->view('parts/howitwork'); ?>
