<a name="readme-top"></a>

<div align="center">
  <h3 align="center">PHP-Excel</h3>
  <p>Import your excel sheet to mysql DB</p>
</div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#license">License</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

![Screen Shot][product-screenshot]

This is a php script which will allow you to import your excel sheet into the mysql DB

Here's why:
* Time effecient
* No need to recreate the wheel
* Will be secure

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### Built With

This section should list any major frameworks/libraries used to bootstrap your project. Leave any add-ons/plugins for the acknowledgements section. Here are a few examples.

* [![php][php]][php-url]
* [![Bootstrap][Bootstrap.com]][Bootstrap-url]
* [![JQuery][JQuery.com]][JQuery-url]

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- GETTING STARTED -->
## Getting Started

By following the instructions you can run the script on your machine

### Prerequisites

Before installing the script you need some external dependencies on your machine
* php extentions
  ```sh
  sudo apt install php-zip php-xml
  ```

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/S4F4Y4T/PHP-Excel.git
   ```
2. Changin folder and files permissions 
   ```sh
   sudo find "Your project directory" -type f -exec chmod 644 {} \;
   sudo find "Your project directory" -type d -exec chmod 755 {} \;
   ```
3. Give the root folder permission to upload

4. Create and import the excel.sql into mysql DB

5. Open config.php and change the db information accordingly

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- USAGE EXAMPLES -->
## Usage

After running the script on your apache server got to the project location and you'll see an upload input there choose the example.xlsx file and hit import then all your excell info will be parsed into mysql table

[![Screen Shot][product-screenshot]]

<p align="right">(<a href="#readme-top">back to top</a>)</p>


<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE.txt` for more information.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->

[product-screenshot]: overview/1.png

[php]: https://img.shields.io/badge/php-php-white
[Php-url]: https://www.php.net/
[Bootstrap.com]: https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white
[Bootstrap-url]: https://getbootstrap.com
[JQuery.com]: https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white
[JQuery-url]: https://jquery.com 
