<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section id="content" class="main-section">
    <div class="container">

        <div id="konfigurator" class="row">
            <form method="POST" action="<?= base_url('buy/person') ?>" class="col s12">

                <div class="row item">
                    <div class="col s12 m6">
                        <h6>Procesor:</h6>
                    </div>
                    <div class="col s12 m6">
                        <label>Wybierz procesor</label>
                        <select id="s_processor" name="processor" class="browser-default">
                            <?php foreach($processors as $processor): ?>
                            <option value="<?= $processor->id ?>" data-price="<?= $processor->price ?>" data-socket="<?= $processor->field['socket'] ?>"><?= $processor->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row item">
                    <div class="col s12 m6">
                        <h6>Płyta główna:</h6>
                    </div>
                    <div class="col s12 m6">
                        <label>Wybierz MOBO</label>
                        <select id="s_mobo" name="mobo" class="browser-default">
                            <?php foreach($mobos as $mobo): ?>
                            <option value="<?= $mobo->id ?>" data-price="<?= $mobo->price ?>" data-socket="<?= $mobo->field['socket'] ?>" data-ram="<?= $mobo->field['ram'] ?>" data-ram-slots="<?= $mobo->field['ram_slot_num'] ?>" data-img="<?= base_url('uploads/').$mobo->img ?>"><?= $mobo->name ?></option>
                            <?php endforeach; ?>
                                

                            <!-- <option value="0" selected>Gigabyte 990XA-UD3 R5</option>
                            <option value="1">ASUS P8B WS</option>
                            <option value="2">MSI B250M PRO-VDH</option>
                            <option value="3">MSI Z370 GAMING PLUS</option>
                            <option value="4">ASRock B250M-HDV</option> -->
                        </select>
                        <img class="preview right" src="" alt="Trwa ładowanie obrazka..." />
                    </div>
                </div>

                <div class="row item">
                    <div class="col s12 m6">
                        <h6>Pamięć RAM:</h6>
                    </div>
                    <div id="s_ram" class="col s12 m6">
                        <label>Wybierz pamięć</label>
                        <select name="ram-1" class="browser-default">
                            <?php foreach($rams as $ram): ?>
                            <option value="<?= $ram->id ?>" data-price="<?= $ram->price ?>" data-type="<?= $ram->field['typ'] ?>"><?= $ram->name ?></option>
                            <?php endforeach; ?>
                        </select>
                        <a id="add_ram" class="btn-floating btn-large waves-effect waves-light main-color right"><i class="material-icons">add</i></a>
                        <a id="delete_ram" class="btn-floating btn-large waves-effect waves-light red right" style="display: none;"><i class="material-icons">delete</i></a>
                    </div>
                </div>

                <div class="row item">
                    <div class="col s12 m6">
                        <h6>Karta graficzna:</h6>
                    </div>
                    <div class="col s12 m6">
                        <label>Wybierz grafikę</label>
                        <select id="s_graphic" name="graphic" class="browser-default">
                            <?php foreach($graphics as $graphic): ?>
                            <option value="<?= $graphic->id ?>" data-price="<?= $graphic->price ?>" data-img="<?= base_url('uploads/').$graphic->img ?>"><?= $graphic->name ?></option>
                            <?php endforeach; ?>
                        </select>
                        <img class="preview right" src="" alt="Trwa ładowanie obrazka..." />
                    </div>
                </div>

                <div class="row item">
                    <div class="col s12 m6">
                        <h6>Dysk:</h6>
                    </div>
                    <div id="s_drive" class="col s12 m6">
                        <label>Wybierz dyski</label>
                        <select name="drive-1" class="browser-default">
                            <?php foreach($drives as $drive): ?>
                            <option value="<?= $drive->id ?>" data-price="<?= $drive->price ?>" data-img="<?= base_url('uploads/').$drive->img ?>"><?= $drive->name ?></option>
                            <?php endforeach; ?>
                        </select>
                        <a id="add_drive" class="btn-floating btn-large waves-effect waves-light main-color right"><i class="material-icons">add</i></a>
                        <a id="delete_drive" class="btn-floating btn-large waves-effect waves-light red right" style="display: none;"><i class="material-icons">delete</i></a>
                    </div>
                </div>

                <div class="row item">
                    <div class="col s12 m6">
                        <h6>Obudowa:</h6>
                    </div>
                    <div class="col s12 m6">
                        <label>Wybierz obudowę</label>
                        <select id="s_case" name="case" class="browser-default">
                           <?php foreach($cases as $case): ?>
                            <option value="<?= $case->id ?>" data-price="<?= $case->price ?>" data-img="<?= base_url('uploads/').$case->img ?>"><?= $case->name ?></option>
                            <?php endforeach; ?>
                        </select>
                        <img class="preview right" src="" alt="Trwa ładowanie obrazka..." />
                    </div>
                </div>
                
                <div class="row item">
                    <div class="col s12 m6">
                        <h6>Zasilacz:</h6>
                    </div>
                    <div class="col s12 m6">
                        <label>Wybierz zasilacz</label>
                        <select id="s_power" name="power" class="browser-default">
                            <?php foreach($powers as $power): ?>
                            <option value="<?= $power->id ?>" data-price="<?= $power->price ?>" data-img="<?= base_url('uploads/').$power->img ?>"><?= $power->name ?></option>
                            <?php endforeach; ?>
                        </select>
                        <img class="preview right" src="" alt="Trwa ładowanie obrazka..." />
                    </div>
                </div>

                <div class="row item">
                    <div class="col s12 m6">
                        <h6>System:</h6>
                    </div>
                    <div class="col s12 m6">
                        <label>Wybierz system</label>
                        <select id="s_system" name="system" class="browser-default">
                            <option value="-1" data-price="0" data-img="">Bez systemu</option>
                            <?php foreach($systems as $system): ?>
                            <option value="<?= $system->id ?>" data-price="<?= $system->price ?>"><?= $system->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                 <div class="row item">
                    <div class="col s12 m12">
                        <h6>Opcje dodatkowe:</h6>
                        <input type="checkbox" id="napis" name="napis" /> <label for="napis">Napis/Logo na obudowie komputera +150PLN</label>
                    </div>
                </div>


                <div class="row submit">
                    <div class="col s12 center">
                        <div class="center"><input type="submit" name="submit" value="ZAMAWIAM" class="button" /></div>
                    </div>
                </div>

            </form>	
        </div>
        
        <div style="z-index: 99; bottom: 0px;right: 0px;position: fixed;background: #02477e;color: #fff;font-weight: 900;padding: 10px 20px;border-top-left-radius: 10px;border-top-right-radius: 10px;opacity: 0.9;">
            Koszt budowy: <span id="total_price">0.00</span> PLN
        </div>
        
    </div>
</section>

<?php $this->load->view('parts/counter'); ?>

<?php $this->load->view('parts/howitwork'); ?>
