# Readme 

- 如果使用的是CGI环境（phpstudy）需要手动将php.ini中开启选项
  allow_url_fopen=On
  allow_url_include=On

- **仅限测试环境**：由于开启这些选项可能增加安全风险，请确保仅在受控的测试环境中进行操作。
- **避免公网暴露**：不要在公网环境中使用这些设置，以防止潜在的远程代码执行等安全漏洞。

- CGI：phpinfo页面查看Server API是否为CGI/FastCGI
- WP：

