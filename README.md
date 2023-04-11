# Magento2-Get-Categories-Image-REST-API
## This Magento2 Module is created to get all categories images via REST API.

# Installation:
1- Download the Repository File. 

2- Unzip the file (in case you downloded a Zip format) and upload the **"app"** folder into your root magento installation. You can also just upload the **"CustomApi"** into **app/code** folder of the Magento. 

3- Use the below commands to install and enable the module:

    * php bin/magento setup:upgrade
    * php bin/magento setup:di:compile
    * php bin/magento cache:flush
    
# Working with API:
You can use the below API in 'GET' method to have all categories image on your Magento store:

**[Your store URL]/V1/allcategories/images**

I hope it helps. 


