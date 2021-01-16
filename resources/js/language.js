



function loadProperties (lang){

    $.i18n.properties({
        name:'Message',    //属性文件名     命名格式： 文件名_国家代号.properties
        path:'i18n/',   //注意这里路径是你属性文件的所在文件夹
        mode:'map',
        language:lang,     //这就是国家代号 name+language刚好组成属性文件名：strings+zh -> strings_zh.properties
        callback:function(){
          for(var i in $.i18n.map){
              $('[data-lang="'+i+'"]').text($.i18n.map[i]);
              $('[data-input="'+i+'"]').attr('placeholder',$.i18n.map[i]);
              $('[data-button="'+i+'"]').val($.i18n.map[i]);
              $('[data-img="'+i+'"]').attr('src',$.i18n.map[i]);
          }
        }
    });

}

function switchLang(lang) {
      loadProperties(lang);

}

loadProperties ('zh')