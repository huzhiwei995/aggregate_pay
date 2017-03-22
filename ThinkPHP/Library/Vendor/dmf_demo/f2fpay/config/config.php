<?php
$config = array (
		//签名方式,默认为RSA2(RSA2048)
		'sign_type' => "RSA2",

		//支付宝公钥
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA38ZGoCbn9wcMFez9DB0q7C7qiDGICBUDy3WgkDxrgr5t+iWCZT+QRUYLbcH7VgIlK9N1Hs51eU//5CmnjdXZhrheuqedIqg45qavbYbt0aRYgyot2hv9+ud+ZqUz2sWJjvrH6zHEuFrdMUPLz7ISrtZ4UrE5Tu6XoxZ5fy4U/pSEoouyw7qb9CoTbVB9RorrUawqjMhCcRCJAlZ/ilCPFc6YiP+xE04HPRXbX+SrrWn/Nzr/jDYEEeWw8w+qJBgEHBOSN8yWdBzYGs7cUztDVQlKPgVcbNtNVhf/ijoBOIWfaN5doPtuWvObAJMul0mZju92P0Lcf9pLjAmFTIKyUQIDAQAB",

		//商户私钥
		'merchant_private_key' => "MIIEpAIBAAKCAQEAugSaMqzwzkjM0my2fvx2lAfCBYCmkHxIKy4fzKCCMQaZP+zTSmhleT8uJqY7cc1mZAFPzU0os64iCbDVxoqJZMe9U2F9bZaYmE4MuQvZNtQwc4uAfKCHErvPyGLdhr3SQUJ0tcIVeWyNf4zSvQ6mCUeJJLKZjrmoCjDMdcJZq2ky63wF0v0LZDnqIZYF9ma/h/rod9l/1zBGdjOpishZIeTE6B73SiVxMVIv803lBTHNgXWc701j/bnEPy+lCgERu+mVHXYu7C0mCPMCMk+2CxnRFUha1hJ1hKW3+x8hAFzfN1eT4yJQ1fsU6AfWE29EMdvXN7zI6NVEoQrp/uPyBQIDAQABAoIBAQCCUKcVyUIJwcZ7w901qPgJTEYIRNBreCW22mE8oVWTsuO5fNeo0OoFvtU+DkamuxZ4CNM3KE7TUbJWx6N7q6IFEEj6GNod49qTGFqhaEOLvasTxy8EIBGAdkJiR6CZvHGHdl781jLlFb8rFCSufYykA5F4PAaHjljCit0xwi2/fokbvaHiZmwfKEGGrjfMxtyAiy/cPkFUvmuhPBlptfISS35b0LDBRWgMsgBdKetVkvY4SsGMHBdZHLRK/QNQAwGdOZrwyvKa9OscL60ib7PbqezXyLdr5Mu4UvFu/mbJi8t+yVgNcYBveFX3Yix/Nu438E9lBgAhHhJQEy/jR1sBAoGBAOXMC9GJmyZdNgJi3rf4xIKB4dEFfn/WPga+1AOHOTXgljchO0v38WAUb+DqiGlypcC7BFYlBppknO4wlFggfYjMH8+6VedwdZ73VaRr6BvNUfTDJ1YS7uBoiserlG5DGusCwF+2UigB01/aRKKxUfTD/sFRRSzMNg3495PnGDrZAoGBAM86nGxQHcmyXwigVw0SHai1Z9IhZ3V7ZOMRv8MQuMeWEukXaRBBh9ThrdKVzma+Z8Ng3eJuOH5zZaY9b9FpaWLXR+s+yHk7Wf9SxSYBIA/wzR8WjCtSWUqhzNJpxYwcH1r3Opsii3n2rTsCp5E6ktHSaonN5zuK2yVy1CDXNX0NAoGBAMuNRxrAzZHaFzFd6vMDhO4lpqXEPB145VCMULkfWuoCmo0S/rd4VXNKJyAQH+1oBLMH9ftoqMSyQuAqX/0AKrK2Pad/4wAzebzqUg5nFx8pbGNnSrzP4JEfiW786WoSPxHVShp+IaAWnenWKd4DPBmYU11iY+geq/MMiiGVHr1hAoGAMbAaBZaILe6I/uaDOO0ZE3S7uhSsW+0EWbXNxxXhWGnRivZECNPNn+uk5BNrdBM/igdV7I8FGLzOqLeechXWYQ7BfdSF+RuUDrZn8x7d8zSH2mZroY+TPWPiWqll5pxvoD4bXUtBKjNNghK23wmuXoUXaodmZE59EVOhLWasupkCgYB5iJNzRUTQkJomao12wDohebMoyNUJGS3C5uvt92qApqinN0xHbTgEJpQY1aIBZNHxJ2BXM6Rr+D6G0fXcssOURLbIMabQwze4Li+XImzj+NvWC09cHWtkNGQ5BjSL+IjsjHbOU1X+BloH32PXL4r43C7MsSkcJDguHEmxuoezMQ==",

		//编码格式
		'charset' => "UTF-8",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//应用ID
		'app_id' => "2016080300157350",

		//异步通知地址,只有扫码支付预下单可用
		'notify_url' => "http://www.baidu.com",

		//最大查询重试次数
		'MaxQueryRetry' => "10",

		//查询间隔
		'QueryDuration' => "3",
);