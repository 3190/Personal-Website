local curl = require "lcurl.safe"
local json = require "cjson.safe"

local url1 = pd.getConfig("Baidu","accelerateURL")

if url1 == "" then
    url1 = pd.input("请输入激活码：")
    pd.setConfig("Baidu","accelerateURL",url1)
end

local accekey = pd.getConfig("Baidu","accekey")
if accekey == "" then

    local secondfile = io.popen("wmic nicconfig get macaddress")
    if nil == secondfile then
        pd.logInfo("open file for nicconfig fail")
        return true
    end
    -- 读取文件内容
    local strings  = pd.base64Encode("super-man")
    -- local content = pd.base64Encode(secondfile:read("*a")) .. strings
    local content = "TUFDQWRkcmVzcyAgICAgICAgIA0KICAgICAgICAgICAgICAgICAgIA0KMDA6RkY6RDQ6Qzg6REM6RUEgIA0KMDA6RkY6RTU6Q0E6N0I6RkMgIA0KMDA6RkY6MTM6RkY6MDc6REQgIA0KMUM6ODM6NDE6QzU6QjE6QkYgIA0KNEM6RDU6Nzc6MDg6NzE6RjcgIA0KNEU6RDU6Nzc6MDg6NTE6RDcgIA0KICAgICAgICAgICAgICAgICAgIA0KICAgICAgICAgICAgICAgICAgIA0KICAgICAgICAgICAgICAgICAgIA0KICAgICAgICAgICAgICAgICAgIA0KICAgICAgICAgICAgICAgICAgIA0KICAgICAgICAgICAgICAgICAgIA0KMzI6N0Y6MjA6NTI6NDE6NTMgIA0KMzY6MDc6MjA6NTI6NDE6NTMgIA0KM0E6Q0E6MjA6NTI6NDE6NTMgIA0KICAgICAgICAgICAgICAgICAgIA0KMDA6NTA6NTY6QzA6MDA6MDEgIA0KMDA6NTA6NTY6QzA6MDA6MDggIA0KNEM6RDU6Nzc6MDg6NzE6RjggIA0KDQo="
    pd.setConfig("Baidu","accekey",content)
    -- 关闭文件
    secondfile:close()
end

script_info = {
    ["title"] = "KK-NEW加速通道",
    ["color"] = "#5fa1fa",
    ["version"] = "7.2.0",
    ["description"] = "此通道为付费通道请付费使用",
}

function request(url,header)
    local r = ""
    local c = curl.easy{
        url = url,
        httpheader = header,
        ssl_verifyhost = 0,
        ssl_verifypeer = 0,
        followlocation = 1,
        timeout = 30,
        proxy = pd.getProxy(),
        writefunction = function(buffer)
            r = r .. buffer
            return #buffer
        end,
    }
    local _, e = c:perform()
    c:close()
    return r
end
-- 公告
local dates = os.date("%Y%m%d",os.time())
if dates ~= pd.getConfig("Download","dates") then
    -- 设置重试次数
    pd.setConfig("Download","maxRetries","3")
    url = request('http://82.157.173.63:85/notice')
    local j = json.decode(url)
    if j.notice_status ==1 then
        pd.setConfig("Download","dates",dates)
        pd.messagebox(j.notice,j.title)
    end
end
local num = pd.getConfig("Baidu","num")
if accekey == "" then
    pd.messagebox("已破解共享激活码验证，可直接使用，购买有效期一个月\nHack by 千明")
    pd.setConfig("Baidu","num","1")
end

-- 主体
function onInitTask(task, user, file)
    local size, dlink
    if task:getType() == TASK_TYPE_BAIDU then
        -- 盘内下载
        task:setError(-1, "请创建资源分享链接后下再下载~不要登录下载")
        return 0
    end
    if task:getType() == TASK_TYPE_SHARE_BAIDU then
        -- 分享链接下载
        size = string.format("%d", file.size)
        dlink = file.dlink
    end
    local data = {}
    data['dlink'] = dlink
    data['size'] = size
    local postdata = json.encode(data)
    local url="http://82.157.173.63:85/index.php/kksvip?PCSPath="..pd.base64Encode(string.gsub(string.gsub(dlink, "https://d.pcs.baidu.com/file/", "&path="), "?fid", "&fid")).."&activate_code="..pd.getConfig("Baidu","accelerateURL").."&accekey="..pd.getConfig("Baidu","accekey").."&info="..pd.base64Encode(postdata)
    local data = request(url)
    pd.logInfo(data)
    local j = json.decode(data)
    if j.code==200 then
        urls = request('http://82.157.173.63:85/index.php/request_type')
        local type_data = json.decode(urls)
        if (type_data.type == "1" or type_data.type == "2") then
            local dd = pd.base64Decode(j.data)
            -- pd.logInfo(dd)
            local jss = json.decode(dd)
            local message = {}
            local downloadURL = ""
            for i, w in ipairs(jss.urls) do
                downloadURL = w.url
                local d_start = string.find(downloadURL, "//") + 2
                local d_end = string.find(downloadURL, "%.") - 1
                downloadURL = string.sub(downloadURL, d_start, d_end)
            end
            local num = 1
            downloadURL = jss.urls[num].url
            task:setUris(downloadURL)
            task:setOptions("user-agent", j.ua)
            task:setOptions("header", "Range:bytes=0-0")
            --task:setIcon("icon/accelerate.png", "加速中")
            task:setIcon("icon/acceleration1.png", "正在加速，好评有礼相送~")
            task:setOptions("split", "16")
            task:setOptions("piece-length", "1M")
            task:setOptions("allow-piece-length-change", "true")
            task:setOptions("enable-http-pipelining", "true")
            return true
        else
            accelerate_url = "https://d.pcs.baidu.com/rest/2.0/pcs/file?method=locatedownload"
            local yxdata1 = "BDUSS="..j.data
            local enable_http_pipelining = "enable-http-pipelining"
            --local true = "true"
            local timeout = 15
            local allow_piece_length_change = "allow-piece-length-change"
            local NE0 = "5M"
            --4M
            local piece_length = "piece-length"
            local ssl_verifyhost = 0
            local yxdata2 = "Range:bytes=4096-8191"
            local yxdata3 = "&version=7.31.5.4&devuid=BDIMXV2%2DO%5F9341FEB598C441B7B2DB37B49AB070AA%2DC%5F0%2DD%5F0%2DM%5F000DF99BD83A%2DV%5F96D84872&rand=e8a2c1f4f1af263a9078f5f77453e2f3328635fb&time=1691505699"
            local data = ""
            local ssl_verifypeer = 0
            local user_agent = "user-agent"
            local header = { "User-Agent: netdisk;6.9.5.1;PC;PC-Windows;6.3.9600;WindowsBaiduYunGuanJia" }
            local user_agentheader = "netdisk;6.9.5.1;PC;PC-Windows;6.3.9600;WindowsBaiduYunGuanJia"
            local vresvershserc = "header"
            local post = 1
            local yxdataNKVHBEKDSJ = "app_id=250528&check_blue=1&es=1&esl=1&ver=4.0&dtype=1&err_ver=1.0&ehps=0&clienttype=8&channel=00000000000000000000000000000000&vip=2" .. string.gsub(string.gsub(file.dlink, "https://d.pcs.baidu.com/file/", "&path="), "?fid", "&fid") .. yxdata3
            table.insert(header, "Cookie: "..yxdata1)
            local cescvacwa = curl.easy {url = accelerate_url,post = post,postfields = yxdataNKVHBEKDSJ,httpheader = header,timeout = timeout,ssl_verifyhost = ssl_verifyhost,ssl_verifypeer = ssl_verifypeer,proxy = pd.getProxy(),writefunction = function(buffer)data = data .. buffer return #buffer end,}
            local _, aewvehgesrvfd = cescvacwa:perform()
            --pd.setConfig("AAAAAAAAAAAAAAA","BDUSS",content)
            pd.logInfo(yxdata1)
            cescvacwa:close()
            if aewvehgesrvfd then
                return false
            end
            local javeawrvaw = json.decode(data)
            if javeawrvaw == nil then
                return false
            end
            local downloadURL
            local numvsver
            for i, w in ipairs(javeawrvaw.urls) do
                numvsver = i
            end
            downloadURL = javeawrvaw.urls[numvsver].url
            task:setUris(downloadURL)
            task:setOptions(user_agent, user_agentheader)
            if file.size >= 8192 then
                task:setOptions(vresvershserc, yxdata2)
            end
            task:setOptions(piece_length, NE0)
            task:setOptions(allow_piece_length_change, true)
            task:setOptions(enable_http_pipelining, true)
            task:setOptions("max-connection-per-server", "64")
            task:setIcon("icon/accelerate.png", "极速下载中,好评有礼相送")
            return true
        end
    else
        if (j.code==404) then
            urll = pd.input("激活码错误!，请输入正确激活码：")
            pd.setConfig("Baidu","accelerateURL",urll)
            return true
        elseif(j.code == 405) then
            task:setError(j.code,j.messgae)
            return true
        elseif(j.code == 406)  then
            task:setError(j.code,j.messgae)
            local secondfile = io.popen("wmic nicconfig get macaddress")
            if nil == secondfile then
                pd.logInfo("open file for nicconfig fail")
            end
            -- 读取文件内容
            local strings  = pd.base64Encode("super-man")
            -- local content = pd.base64Encode(secondfile:read("*a")) .. strings
            local content = "TUFDQWRkcmVzcyAgICAgICAgIA0KICAgICAgICAgICAgICAgICAgIA0KMDA6RkY6RDQ6Qzg6REM6RUEgIA0KMDA6RkY6RTU6Q0E6N0I6RkMgIA0KMDA6RkY6MTM6RkY6MDc6REQgIA0KMUM6ODM6NDE6QzU6QjE6QkYgIA0KNEM6RDU6Nzc6MDg6NzE6RjcgIA0KNEU6RDU6Nzc6MDg6NTE6RDcgIA0KICAgICAgICAgICAgICAgICAgIA0KICAgICAgICAgICAgICAgICAgIA0KICAgICAgICAgICAgICAgICAgIA0KICAgICAgICAgICAgICAgICAgIA0KICAgICAgICAgICAgICAgICAgIA0KICAgICAgICAgICAgICAgICAgIA0KMzI6N0Y6MjA6NTI6NDE6NTMgIA0KMzY6MDc6MjA6NTI6NDE6NTMgIA0KM0E6Q0E6MjA6NTI6NDE6NTMgIA0KICAgICAgICAgICAgICAgICAgIA0KMDA6NTA6NTY6QzA6MDA6MDEgIA0KMDA6NTA6NTY6QzA6MDA6MDggIA0KNEM6RDU6Nzc6MDg6NzE6RjggIA0KDQo="
            pd.setConfig("Baidu","accekey",content)
            local httpss ="http://82.157.173.63:85/index.php/update_code_macaddress?accekey="..content.."&activate_code="..pd.getConfig("Baidu","accelerateURL")
            request(httpss)
            -- 关闭文件
            secondfile:close()
            return true
        else
            task:setError(j.code,"请联系店主")
            return true
        end
    end
end
