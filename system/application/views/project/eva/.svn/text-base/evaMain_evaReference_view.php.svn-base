<?php
/*
 *
 * @copyright (c) 2009 The PBCLS Team
 * @author cendy <cendymail@163.com>
 * @version 0.1
 *
 */
?>
<!-- display main page -->

<?php if(!$isInstructor){?>
<table border="0" cellspacing="0" cellpadding="3" class="docTable">
<tr><th colspan="6">自评参考</th></tr>
<tr><th width="40"><span>评价项目</span></th><th width="40"><span>权重%</span></th>
<th width="110"><span>等级A</span></th><th width="110"><span>等级B</span></th><th width="110"><span>等级C</span></th><th width="110"><span>等级D</span></th></tr>
<tr><td><span>学习态度</span></td><td><span><?php if($isPm)echo "14";else echo "20";?></span></td><td><span>主动学习、积极讨论</span></td><td><span>能完成学习任务，能参加讨论</span></td>
<td><span>拖沓完成学习任务，很少参加讨论</span></td><td><span>最后完成任务、不参加讨论</span></td>
</tr>
<tr><td><span>专业能力</span></td><td><span><?php if($isPm)echo "14";else echo "20";?></span></td><td><span>能解决所有技术问题</span></td><td><span>能解决大部分技术问题</span></td>
<td><span>仅能解决少量技术问题，很少参加讨论</span></td><td><span>都不能自己解决</span></td>
</tr>
<tr><td><span>沟通能力</span></td><td><span><?php if($isPm)echo "14";else echo "20";?></span></td><td><span>能很好的与别人沟通</span></td><td><span>沟通中基本上没有障碍</span></td>
<td><span>沟通中经常有辞不达意的地方</span></td><td><span>无法清晰地表达自己的意思</span></td>
</tr>
<tr><td><span>协作能力</span></td><td><span><?php if($isPm)echo "14";else echo "20";?></span></td><td><span>能很好的与别人协作</span></td><td><span>协作中基本上没有障碍</span></td>
<td><span>协作中与别人经常有矛盾</span></td><td><span>无法协作，只能单独自己干活</span></td>
</tr>
<?php }?>
<?php if($isPm){?>
<tr><td><span>组织能力</span></td><td><span>14</span></td><td><span>因人而异、合理组织</span></td><td><span>能组织大家按时完成任务</span></td>
<td><span>能组织大家完成任务，但时间和质量有问题</span></td><td><span>不能组织大家完成任务，项目失败</span></td>
</tr>
<tr><td><span>决策能力</span></td><td><span>14</span></td><td><span>出现问题是能很好的决断</span></td><td><span>出现问题是能够独立解决</span></td>
<td><span>出现问题是能在老师的帮助下解决</span></td><td><span>出现问题经常不知如何解决</span></td>
</tr>
<tr><td><span>学习成果</span></td><td><span>16</span></td><td><span>带领成员高质量的完成项目，得到好评</span></td><td><span>带领成员完成项目，得分B</span></td>
<td><span>带领成员完成项目，得分C</span></td><td><span>项目失败，得分D</span></td>
</tr>	
<?php }?>
<?php if(!$isPm && !$isInstructor){?>
<tr><td><span>学习成果</span></td><td><span>20</span></td><td><span>高质量独立完成所有任务</span></td><td><span>能独立完成所有任务，质量一般</span></td>
<td><span>在别人的帮助下能完成相关任务</span></td><td><span>不能完成相关任务，或基本抄袭别人</span></td>
</tr>
<?php }?>

</table>

<?php if(!$isPm && !$isInstructor){?>
<table border="0" cellspacing="0" cellpadding="3" class="docTable">
<tr><th colspan="6">组员互评参考</th></tr>
<tr><th width="40"><span>评价项目</span></th><th width="40"><span>权重%</span></th>
<th width="110"><span>等级A</span></th><th width="110"><span>等级B</span></th><th width="110"><span>等级C</span></th><th width="110"><span>等级D</span></th></tr>
<tr><td><span>学习态度</span></td><td><span>20</span></td><td><span>主动学习、积极讨论</span></td><td><span>能完成学习任务，能参加讨论</span></td>
<td><span>拖沓完成学习任务，很少参加讨论</span></td><td><span>最后完成任务、不参加讨论</span></td>
</tr>
<tr><td><span>专业能力</span></td><td><span>20</span></td><td><span>能解决所有技术问题</span></td><td><span>能解决大部分技术问题</span></td>
<td><span>仅能解决少量技术问题</span></td><td><span>都不能解决</span></td>
</tr>
<tr><td><span>沟通能力</span></td><td><span>20</span></td><td><span>能很好的与别人沟通</span></td><td><span>沟通中基本上没有障碍</span></td>
<td><span>沟通中经常有辞不达意的地方</span></td><td><span>无法清晰地表达自己的意思</span></td>
</tr>
<tr><td><span>协作能力</span></td><td><span>20</span></td><td><span>能很好的与别人协作</span></td><td><span>协作中基本上没有障碍</span></td>
<td><span>协作中与别人经常有矛盾</span></td><td><span>无法协作，只能单独自己干活</span></td>
</tr>
<tr><td><span>对自己的帮助</span></td><td><span>20</span></td><td><span>在项目经常且主动帮助自己</span></td><td><span>能在要求时及时帮助自己</span></td>
<td><span>能在要求时提供帮助</span></td><td><span>没有帮助过自己</span></td>
</tr>
</table>
<?php } ?>

<?php if(!$isPm && !$isInstructor){?>
<table border="0" cellspacing="0" cellpadding="3" class="docTable">
<tr><th colspan="6">小组成员对项目经理评价参考</th></tr>
<tr><th width="40"><span>评价项目</span></th><th width="40"><span>权重%</span></th>
<th width="110"><span>等级A</span></th><th width="110"><span>等级B</span></th><th width="110"><span>等级C</span></th><th width="110"><span>等级D</span></th></tr>
<tr><td><span>学习态度</span></td><td><span>10</span></td><td><span>主动学习、积极讨论</span></td><td><span>能完成学习任务，能参加讨论</span></td>
<td><span>拖沓完成学习任务，很少参加讨论</span></td><td><span>最后完成任务、不参加讨论</span></td>
</tr>
<tr><td><span>专业能力</span></td><td><span>16</span></td><td><span>能解决所有技术问题</span></td><td><span>能解决大部分技术问题</span></td>
<td><span>仅能解决少量技术问题</span></td><td><span>都不能解决</span></td>
</tr>
<tr><td><span>沟通能力</span></td><td><span>16</span></td><td><span>能很好的与别人沟通</span></td><td><span>沟通中基本上没有障碍</span></td>
<td><span>沟通中经常有辞不达意的地方</span></td><td><span>无法清晰地表达自己的意思</span></td>
</tr>
<tr><td><span>协调能力</span></td><td><span>16</span></td><td><span>很好的协调，无可挑剔</span></td><td><span>能在出现问题是及时协调</span></td>
<td><span>能协调大家完成任务</span></td><td><span>不能协调，经常出现合作问题</span></td>
</tr>
<tr><td><span>组织能力</span></td><td><span>16</span></td><td><span>因人而异、合理组织</span></td><td><span>能组织大家按时完成任务</span></td>
<td><span>能组织大家完成任务，但时间和质量有问题</span></td><td><span>不能组织大家完成任务，项目失败</span></td>
</tr>
<tr><td><span>决策能力</span></td><td><span>16</span></td><td><span>出现问题是能很好的决断</span></td><td><span>出现问题是能够独立解决</span></td>
<td><span>出现问题是能在老师的帮助下解决</span></td><td><span>出现问题经常不知如何解决</span></td>
</tr>
<tr><td><span>对自己的帮助</span></td><td><span>10</span></td><td><span>在项目经常且主动帮助自己</span></td><td><span>能在要求时及时帮助自己</span></td>
<td><span>能在要求时提供帮助</span></td><td><span>没有帮助过自己</span></td>
</tr>
</table>
<?php } ?>


<?php if($isPm){?>
<table border="0" cellspacing="0" cellpadding="3" class="docTable">
<tr><th colspan="6">项目经理对小组成员评价参考</th></tr>
<tr><th width="40"><span>评价项目</span></th><th width="40"><span>权重%</span></th>
<th width="110"><span>等级A</span></th><th width="110"><span>等级B</span></th><th width="110"><span>等级C</span></th><th width="110"><span>等级D</span></th></tr>
<tr><td><span>学习态度</span></td><td><span>10</span></td><td><span>主动学习、积极讨论</span></td><td><span>能完成学习任务，能参加讨论</span></td>
<td><span>拖沓完成学习任务，很少参加讨论</span></td><td><span>最后完成任务、不参加讨论</span></td>
</tr>
<tr><td><span>专业能力</span></td><td><span>10</span></td><td><span>能解决所有技术问题</span></td><td><span>能解决大部分技术问题</span></td>
<td><span>仅能解决少量技术问题</span></td><td><span>都不能解决</span></td>
</tr>
<tr><td><span>沟通能力</span></td><td><span>10</span></td><td><span>能很好的与别人沟通</span></td><td><span>沟通中基本上没有障碍</span></td>
<td><span>沟通中经常有辞不达意的地方</span></td><td><span>无法清晰地表达自己的意思</span></td>
</tr>
<tr><td><span>协作能力</span></td><td><span>10</span></td><td><span>能很好的与别人协作</span></td><td><span>协作中基本上没有障碍</span></td>
<td><span>协作中与别人经常有矛盾</span></td><td><span>无法协作，只能单独自己干活</span></td>
</tr>
<tr><td><span>文档通过率</span></td><td><span>5</span></td><td><span>文档全部一次提交通过</span></td><td><span>文档一次通过率为80%-100%</span></td>
<td><span>文档一次通过率为60%—80%</span></td><td><span>文档一次通过率为60%以下</span></td>
</tr>
<tr><td><span>文档时间情况</span></td><td><span>5</span></td><td><span>文档全部在时间要求内提交通过</span></td><td><span>文档80-100%在时间要求内提交通过</span></td>
<td><span>文档60-80%在时间要求内提交通过</span></td><td><span>文档在时间要求内提交通过的为60%以下</span></td>
</tr>
<tr><td><span>文档正确情况</span></td><td><span>30</span></td><td><span>文档质量很高，程序正常运行</span></td><td><span>文档满足要求，程序有个别bug</span></td>
<td><span>文档有少许错误，程序有较多bug</span></td><td><span>文档错误很多，程序bug很多</span></td>
</tr>
<tr><td><span>文档创新情况</span></td><td><span>10</span></td><td><span>创新思想和创新点很多</span></td><td><span>有创新思想和创新点</span></td>
<td><span>无创新，但无抄袭</span></td><td><span>有抄袭嫌疑</span></td>
</tr>
<tr><td><span>文档风格</span></td><td><span>10</span></td><td><span>代码风格良好，容易阅读</span></td><td><span>文档基本规范，不影响阅读</span></td>
<td><span>文档风格很糟，影响阅读</span></td><td><span>结构混乱，严重影响阅读</span></td>
</tr>
</table>
<?php } ?>

<?php if($isInstructor){?>
<table border="0" cellspacing="0" cellpadding="3" class="docTable">
<tr><th colspan="6">指导者对小组成员评价参考</th></tr>
<tr><th width="40"><span>评价项目</span></th><th width="40"><span>权重%</span></th>
<th width="110"><span>等级A</span></th><th width="110"><span>等级B</span></th><th width="110"><span>等级C</span></th><th width="110"><span>等级D</span></th></tr>
<tr><td><span>学习态度</span></td><td><span>20</span></td><td><span>每天连续登陆超半小时的天数为满额</span></td><td><span>每天连续登陆超半小时的天数占任务时间的4/5以上</span></td>
<td><span>每天连续登陆超半小时的天数占任务时间的3/5至4/5</span></td><td><span>每天连续登陆超半小时的天数占任务时间的3/5以下</span></td>
</tr>
<tr><td><span>上传下载数量</span></td><td><span>20</span></td><td><span>上传或下载相关文档4次以上</span></td><td><span>上传或下载相关文档3次</span></td>
<td><span>上传或下载相关文档2次</span></td><td><span>上传或下载相关文档1次及以下</span></td>
</tr>
<tr><td><span>文档被引用次数</span></td><td><span>20</span></td><td><span>上传文档被下载4次及以上</span></td><td><span>上传文档被下载3次</span></td>
<td><span>上传文档被下载2次</span></td><td><span>上传文档被下载1次及以下</span></td>
</tr>
<tr><td><span>BBS问答次数</span></td><td><span>20</span></td><td><span>提问或回复不同主题10次以上</span></td><td><span>提问或回复不同主题8-10次</span></td>
<td><span>提问或回复不同主题5-7次</span></td><td><span>提问或回复不同主题4次及以下</span></td>
</tr>
<tr><td><span>BBS问答质量</span></td><td><span>20</span></td><td><span>讨论紧贴要求，条理分明，论证充分，回答有创新性</span></td><td><span>讨论切题，基本上能说明问题</span></td>
<td><span>偶尔有错误发表留言很短、缺乏相关性、逻辑较差</span></td><td><span>发言几乎和主题无关，涉嫌灌水</span></td>
</tr>
</table>


<table border="0" cellspacing="0" cellpadding="3" class="docTable">
<tr><th colspan="6">指导者对项目小组评价参考</th></tr>
<tr><th width="40"><span>评价项目</span></th><th width="40"><span>权重%</span></th>
<th width="110"><span>等级A</span></th><th width="110"><span>等级B</span></th><th width="110"><span>等级C</span></th><th width="110"><span>等级D</span></th></tr>

<tr><td><span>上传下载数量</span></td><td><span>10</span></td><td><span>上传或下载相关文档10次以上</span></td><td><span>上传或下载相关文档8-10次</span></td>
<td><span>上传或下载相关文档5-7次</span></td><td><span>上传或下载相关文档4次及以下</span></td>
</tr>
<tr><td><span>文档被引用次数</span></td><td><span>10</span></td><td><span>上传且被下载10次以上文档个数大于4</span></td><td><span>上传且被下载10次以上文档个数3个</span></td>
<td><span>上传且被下载10次以上文档个数2个</span></td><td><span>上传且被下载10次以上文档个数小于等于1个</span></td>
</tr>
<tr><td><span>BBS问答次数</span></td><td><span>10</span></td><td><span>回复大于10的主题10个以上</span></td><td><span>回复大于10的主题8-10个</span></td>
<td><span>回复大于10的主题5-7个</span></td><td><span>回复大于10的主题4个及以下</span></td>
</tr>
<tr><td><span>BBS问答质量</span></td><td><span>10</span></td><td><span>讨论紧贴要求，条理分明，论证充分，回答有创新性</span></td><td><span>讨论切题，基本上能说明问题</span></td>
<td><span>偶尔有错误发表留言很短、缺乏相关性、逻辑较差</span></td><td><span>发言几乎和主题无关，涉嫌灌水</span></td>
</tr>
<tr><td><span>项目时间情况</span></td><td><span>10</span></td><td><span>在规定时间内完成</span></td><td><span>完成时间推迟1-3天</span></td>
<td><span>完成时间推迟4-6天</span></td><td><span>完成时间推迟7天及以上</span></td>
</tr>
<tr><td><span>文档正确情况</span></td><td><span>30</span></td><td><span>文档质量很高，程序正常运行</span></td><td><span>文档满足要求，程序有个别bug</span></td>
<td><span>文档有少许错误，程序有较多bug</span></td><td><span>文档错误很多，程序bug很多</span></td>
</tr>
<tr><td><span>文档创新情况</span></td><td><span>10</span></td><td><span>创新思想和创新点很多</span></td><td><span>有创新思想和创新点</span></td>
<td><span>无创新，但无抄袭</span></td><td><span>成员中有抄袭嫌疑</span></td>
</tr>
<tr><td><span>文档风格</span></td><td><span>10</span></td><td><span>代码风格良好，容易阅读</span></td><td><span>文档基本规范，不影响阅读</span></td>
<td><span>文档风格很糟，影响阅读</span></td><td><span>结构混乱，严重影响阅读</span></td>
</tr>
</table>

<?php } ?>