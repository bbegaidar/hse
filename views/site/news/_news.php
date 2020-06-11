<?php use yii\widgets\Menu; ?>
<?php use yii\helpers\Html; ?>
<?php use yii\helpers\Url; ?>


<?php Url::remember();?>

    <main class="main">
        <aside>
            <div class="closeNewsList text-wrap pc">
                <h2><?= Yii::t('news','News сategories')?></h2>
                <?php 
                $items = [];
                foreach ($categories as $category) {
                    $item  = ['label' => Yii::t('news',$category->description), 'url'=> ['site/news', 'category' => $category->id]];
                    array_push($items, $item);
                }
                ?>
                <? echo Menu::widget([ 'items' => $items, 'linkTemplate' => '<a href="{url}">'.Html::img('/img/news/li-img.png', ['alt' => '']).'{label}</a>' ]); ?>
            </div>
            <div class="dropdown-wrap mob">
              <form>
                <fieldset>
                  <legend><?= Yii::t('news','News сategories')?></legend>
                  <select name="news-select">
                      <option value="<?= Url::toRoute(['site/news'])?>"><?= Yii::t('news','All news') ?></option>
                    <?php    foreach ($categories as $category) {
                                echo '<option value="'.Url::toRoute(['site/news', 'category' => $category->id]).'">'.Yii::t('news',$category->description).'</option>';
                            }
                    ?>
                  </select>
                </fieldset>
              </form>
            </div>

            <div class="openNewsList">
                <div class="btn2 d-none"><?= Yii::t('news','Back to news') ?></div>
            </div>
            
        </aside>
        <div class="main-content news-content closeNews d-none"></div>
        <?= $this->render('_carousel', ['news' => $news]) ?>
    </main>
    
    