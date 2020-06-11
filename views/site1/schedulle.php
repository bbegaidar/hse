<?php $this->title = 'Расписание'; ?>
<?php  include "header.php"?>
<section class="schedule-page1 web">
    <div class="word container">
        <p>РАСПИСАНИЕ</p>
    </div>
</section>
<section class="table-schedulle web">
    <table>
        <tr>
            <th>Город</th>
            <th>Дата</th>
            <th>Название</th>
            <th></th>
        </tr>
        <tbody id="scheduleBody">        
            <?php $count=0; foreach ($trainings as $training): ?>
                <tr>
                    <td><?=$training->city?></td>
                    <td><?=$training->startDate?></td>
                    <td><?=$training->title?></td>
                    <td> 
                        <?php if (!$isGuest): ?>
                            <?php if (in_array($training->id,$entries)): ?> <button style="pointer-events: none;" class = 'schedulle_button' data-id = "<?=Yii::t('static', 'You are already recorded')?>"><?=Yii::t('static', 'You are already recorded')?></button> 
                            <?php else: ?> <button onclick="location.href='/site1/entry?id=<?=$training->id?>'" class = 'schedulle_button' data-id = "<?=Yii::t('static', 'Submit your application')?>"><?=Yii::t('static', 'Submit your application')?></button> <?php endif; ?> 
                        <?php else: ?>
                            <button onclick="location.href='/site/login'" class = 'schedulle_button' data-id = "Зарегистрироваться">Зарегистрироваться</button>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php $count++; endforeach; ?>
        </tbody>
        <?php if (!empty($trainings)): ?>       
            <tr>
                <td></td>
                <td></td>
                <td><div class = "center_button"><button class = 'schedulle_button'>ЗАГРУЗИТЬ ЕЩЁ</button></div></td>
                <td></td>
            </tr>
        <?php endif; ?>
    </table>
    <div data-id="<?=$count?>" data-auth="<?=$isGuest?>" id="scheduleCount"></div>
</section>
<section id="schedullePage_mob" class = "mobile">
    <div class="pageTitle_mob">
        <div class="container">
            <p class="pageTitle_text_mob">Расписание</p>
        </div>
    </div>
    
    <div class="container">
        <?php foreach ($trainings as $training): ?>
            <div class="schedulleTable_mob">
                <div class="shadowWrap"></div>
                <table class="schedulleTable_table_mob">
                    <tr>
                        <td class="schedulleTable_td_left_mob">Город</td>
                        <td class="schedulleTable_td_right_mob"><?=$training->city?></td>
                    </tr>
                    <tr>
                        <td class="schedulleTable_td_left_mob">Дата</td>
                        <td class="schedulleTable_td_right_mob"><?=$training->startDate?></td>
                    </tr>
                    <tr>
                        <td class="schedulleTable_td_left_mob">Название</td>
                        <td class="schedulleTable_td_right_mob"><?=$training->title?></td>
                    </tr>
                    <tr>
                        <?php if (!$isGuest): ?>
                            <?php if (in_array($training->id,$entries)): ?>
                                <table class="noShadow">
                                    <td class ="schedulleTable_td_bottom_mob">
                                        <button style="pointer-events: none;" class="schedulleTable_btn_mob">
                                            <p><?=Yii::t('static', 'You are already recorded')?></p>
                                        </button>
                                    </td>
                                </table>
                            <?php else: ?>
                                <table class="noShadow">
                                    <td class ="schedulleTable_td_bottom_mob">
                                        <button onclick="location.href='/site1/entry?id=<?=$training->id?>'" style="pointer-events: none;" class="schedulleTable_btn_mob">
                                            <p><?=Yii::t('static', 'Submit your application')?></p>
                                        </button>
                                    </td>
                                </table>
                            <?php endif; ?>
                        <?php else: ?>
                            <table class="noShadow">
                                <td class ="schedulleTable_td_bottom_mob">
                                    <button onclick="location.href='/site/login'" class="schedulleTable_btn_mob">
                                        <p>Зарегистрироваться</p>
                                    </button>
                                </td>
                            </table>
                        <?php endif; ?>
                    </tr>
                </table>        
            </div>
        <?php endforeach; ?>        
        <!-- <div class="schedulleTable_mob">
            <div class="shadowWrap"></div>
            <table class="schedulleTable_table_mob">
                <tr>
                    <td class="schedulleTable_td_left_mob">Город</td>
                    <td class="schedulleTable_td_right_mob">Нур-Султан</td>
                </tr>
                <tr>
                    <td class="schedulleTable_td_left_mob">Дата</td>
                    <td class="schedulleTable_td_right_mob">04.03.2020</td>
                </tr>
                <tr>
                    <td class="schedulleTable_td_left_mob">Название</td>
                    <td class="schedulleTable_td_right_mob">Охрана и безопасность</td>
                </tr>
                <tr>
                <table class="noShadow">
                        <td class ="schedulleTable_td_bottom_mob">
                            <button class="schedulleTable_btn_mob">
                                <p>Зарегистрироваться</p>
                            </button>
                        </td>
                    </table>
                </tr>
            </table>        
        </div> -->
    </div>
</section>
<?php include "footer.php"; ?>
<script src="/js1/schedule.js"></script>
    

