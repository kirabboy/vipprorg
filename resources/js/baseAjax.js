var http = {
        /**
		 * url: 请求接口地址, type: 请求类型 POST GET, json: 数据请求方式, mask: 是否有loading,
		 * data: 请求参数
		 */
        ajax(options) {
            var loading = '';
            let def = $.Deferred();
            if (options.mask) {
                // loading = layer.msg('加载中', {
                //     icon: 16,
                //     shade: 0.01,
                //     time: 0
                // });
            }
            $.ajax({
                url: this.config.api + options.url,
                data: options.data,
                type: options.type,
                headers: {
                    'token': this.config.token
                },
                contentType: options.json ? 'application/json;charset=UTF-8' : 'application/x-www-form-urlencoded'
            }).then(function(rsp) {
                def.resolve(rsp);
                setTimeout(function(){
                  //  layer.close(loading);
                },100)
            }, function(error) {
                if(error.status==504){
                    // layer.msg('请求超时，请重试', {
                    //     icon: 5
                    // });
                }else if(error.responseText){
                    var err = JSON.parse(error.responseText);
                    var code = err.code; // 错误码
                    var emsg = err.message; // 错误内容提示（字符串）
                    switch (code) {
                        case 2022: // 2022 掉线，重新登录
                            layer.msg(emsg, {
                                icon: 5
                            }, function() {
                                location.href = '/login.html';
                            });
                            break;
                    }
                }
                def.reject(error);
                setTimeout(function(){
                   // layer.close(loading);
                },100)
            });
            return def;
        },
        init(){
        	if(this.getUrlParam("token")){
        		localStorage.setItem("token",this.getUrlParam("token"));
        		this.config.token=this.getUrlParam("token");
        	}
        },
        getUrlParam(name) {
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); // 构造一个含有目标参数的正则表达式对象
            var r = window.location.search.substr(1).match(reg); // 匹配目标参数
            if (r != null){
                return unescape(r[2]);
            };
            return null; 
        },
      
        config : {
            api: 'http://192.168.1.82:8001/', // 请求地址前缀
            token:0
        }
    }
//http.init()

