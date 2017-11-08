<?php
//事件推送推送
public function responseMsg()
   {

      //$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
      //$postStr = file_get_contents("php://input");//因为很多都设置了register_globals禁止,不能用$GLOBALS["HTTP_RAW_POST_DATA"];
       $postStr = file_get_contents("php://input");

       if (!empty($postStr)){
               libxml_disable_entity_loader(true);
                 $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
               $fromUsername = $postObj->FromUserName;
               $toUsername = $postObj->ToUserName;
               $keyword = trim($postObj->Content);
               $time = time();
               $textTpl = "<xml><ToUserName><![CDATA[%s]]></ToUserName>
                           <FromUserName><![CDATA[%s]]></FromUserName>
                           <CreateTime>%s</CreateTime>
                           <MsgType><![CDATA[text]]></MsgType>
                           <Content><![CDATA[%s]]></Content>
                           <FuncFlag>0</FuncFlag>
                           </xml>";
  if($postObj->MsgType=='event'){
  if($postObj->Event == 'CLICK'){
   if($postObj->EventKey == '123'){
     //触发关键词123
    //返回关键词
  $contentStr = "400 867 5521";
  $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $contentStr);
  echo $resultStr;
  }
  }
  }

       }else {
           echo "success";
           //打开网页
       }
   }
 ?>
