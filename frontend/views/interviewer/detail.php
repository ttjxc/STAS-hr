<?php

use frontend\assets\AppAsset;
use yii\helpers\Html;

$this->title = '面试';
AppAsset::register($this);
AppAsset::addScript($this,'@web/statics/jquery-bar-rating/dist/jquery.barrating.min.js');
AppAsset::addCss($this,'@web/statics/jquery-bar-rating/dist/themes/fontawesome-stars.css');
?>
<div style="margin-right: auto; margin-left: auto;max-width:750px;">
    <?php if(!empty($data['hire'])):?>
        <?php $hireAction = 'delete';$hireButton = '取消录用'; ?>
        <div class="alert alert-success" role="alert">由 <?=Html::encode($data['hire']['iname'])?> 标记为录用</div>
    <?php else:?>
        <?php $hireAction = 'save';$hireButton = '标记录用'; ?>
    <?php endif;?>

    <?php if($data['first_wish'] !== $data['sign']['department']):?>
        <div class="alert alert-success" role="alert">由 <?=Html::encode($data['first_wish'])?> 推送至 <?=Html::encode($data['sign']['department'])?></div>
    <?php endif;?>

    <table class="table table-bordered">
      <tbody>
        <tr>
          <th scope="row">姓名</th>
          <td><?=Html::encode($data['name'])?></td>
          <th>学号</th>
          <td><?=Html::encode($data['sid'])?></td>
        </tr>
        <tr>
          <th scope="row">性别</th>
          <td><?=Html::encode($data['sex'])?></td>
          <th>出生年月</th>
          <td><?=Html::encode($data['birthday'])?></td>
        </tr>
        <tr>
          <th scope="row">籍贯</th>
          <td><?=Html::encode($data['place'])?></td>
          <th>政治面貌</th>
          <td><?=Html::encode($data['identity'])?></td>
        </tr>
        <tr>
          <th scope="row">学院</th>
          <td><?=Html::encode($data['college'])?></td>
          <th>专业班级</th>
          <td><?=Html::encode($data['class'])?></td>
        </tr>
        <tr>
          <th scope="row">宿舍区</th>
          <td><?=Html::encode($data['dorm'])?></td>
          <th>手机号</th>
          <td><?=Html::encode($data['phone'])?></td>
        </tr>
        <tr>
          <th scope="row">QQ号</th>
          <td><?=Html::encode($data['qq'])?></td>
          <td colspan="2"></td>
        </tr>
        <tr>
          <th scope="row">第一志愿</th>
          <td><?=Html::encode($data['first_wish'])?></td>
          <th>第二志愿</th>
          <td><?=Html::encode($data['second_wish'])?></td>
        </tr>
        <tr>
          <th scope="row">兴趣爱好</th>
          <td colspan="3" width="75%"><?=Html::encode($data['hobbies'])?></td>
        </tr>
        <tr>
          <th scope="row">个人简历及自身优势</th>
          <td colspan="3" width="75%"><?=Html::encode($data['myself'])?></td>
        </tr>
        <tr>
          <th scope="row">希望在科协学到什么，对科协的认识及工作设想</th>
          <td colspan="3" width="75%"><?=Html::encode($data['hope'])?></td>
        </tr>
      </tbody>
    </table>
    <div style="border:1px solid #ddd;padding-top:25px;padding-left:20px;padding-right:20px;padding-bottom:15px;">
        <form action="<?=\yii\helpers\Url::to(['review'])?>" method="post">
            <input type="hidden" name="_csrf-frontend" value="<?php echo Yii::$app->getRequest()->getCsrfToken(); ?>"/>
            <input type="hidden" name="ReviewForm[rid]" value="<?=Html::encode($data['id'])?>"/>
            <div class="row">
                <div class="col-md-3">
                    <label>技术能力：</label>
                    <select id="star-1" name="ReviewForm[star_1]" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5" selected="">5</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>表达能力：</label>
                    <select id="star-2" name="ReviewForm[star_2]" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5" selected="">5</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>个人感觉：</label>
                    <select id="star-3" name="ReviewForm[star_3]" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5" selected="">5</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>颜值：</label>
                    <select id="star-4" name="ReviewForm[star_4]" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5" selected="">5</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>态度：</label>
                    <select id="star-5" name="ReviewForm[star_5]" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5" selected="">5</option>
                    </select>
                </div>
            </div>
            <label>评价：</label>
            <textarea class="form-control" rows="5" name="ReviewForm[content]" required></textarea>
            <p style="margin-top:10px;">
              <button type="submit" class="btn btn-default">提交</button>
            </p>
      </form>
    </div>
    <hr />
    <div class="row">
        <div class="col-md-6">
            <form class="form-inline" action="<?=\yii\helpers\Url::to(['transfer'])?>" method="post">
                <input type="hidden" name="_csrf-frontend" value="<?php echo Yii::$app->getRequest()->getCsrfToken(); ?>"/>
                <input type="hidden" name="rid" value="<?=Html::encode($data['id'])?>"/>
                <div class="form-group">
                    <label>将简历推送至</label>
                    <select name="department" class="form-control">
                        <?php foreach (Yii::$app->params['department'] as $v):?>
                            <?php if($v !== $data['sign']['department']):?>
                                <option value="<?=Html::encode($v)?>"><?=Html::encode($v)?></option>
                            <?php endif;?>
                        <?php endforeach;?>
                    </select>
                </div>
                <button type="submit" class="btn btn-default">发送</button>
            </form>
        </div>
        <div class="col-md-6" style="text-align: right;">
            <form action="<?=\yii\helpers\Url::to(['hire'])?>" method="post">
                <input type="hidden" name="_csrf-frontend" value="<?php echo Yii::$app->getRequest()->getCsrfToken(); ?>"/>
                <input type="hidden" name="rid" value="<?=Html::encode($data['id'])?>"/>
                <input type="hidden" name="hireAction" value="<?=Html::encode($hireAction)?>"/>
                <button class="btn btn-default" type="submit"><?=Html::encode($hireButton)?></button>
            </form>
        </div>
    </div>
    <hr />
    <?php if(empty($reviews)):?>
        <p>暂无评价</p>
    <?php else:?>
        <?php foreach ($reviews as $v):?>
            <div style="border:1px solid #ddd;padding-top:12px;padding-left:15px;padding-right:15px;">
              <p>
                <?=Html::encode($v['iname'])?>
              </p>
              <p>
                  技术：<?=Html::encode($v['star_1'])?>分
                  表达：<?=Html::encode($v['star_2'])?>分
                  感觉：<?=Html::encode($v['star_3'])?>分
                  颜值：<?=Html::encode($v['star_4'])?>分
                  态度：<?=Html::encode($v['star_5'])?>分
              </p>
              <p>
                评价：<?=Html::encode($v['content'])?>
              </p>
              <P>
                发表时间：<?=Html::encode(date('m-d H:i',$v['time']))?>
              </P>
            </div>
            <br>
        <?php endforeach;?>
    <?php endif;?>
</div>


<?php $this->beginBlock('star'); ?>

   $(function() {
      $('#star-1,#star-2,#star-3,#star-4,#star-5').barrating({
        theme: 'fontawesome-stars'
      });
   });

<?php $this->endBlock() ?>
<?php $this->registerJs($this->blocks['star'], \yii\web\View::POS_END); ?>
