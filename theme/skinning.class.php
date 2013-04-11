<?php

/*
 * While($x) 
 *   Copyright (C) 2013  While($x) Team
 * 
 *   WebSite: http://www.whilex.it/
 *   GitHub: https://github.com/whilex
 *
 *   This program is free software: you can redistribute it and/or modify
 *   it under the terms of the GNU Affero General Public License as published by
 *   the Free Software Foundation, either version 3 of the License, or
 *   (at your option) any later version.
 *
 *   This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU Affero General Public License for more details.
 *
 *   You should have received a copy of the GNU Affero General Public License
 *   along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * 
 *   @author TriX93 <valerillo93@me.com>
 */
  class skinning {
      
      protected $_layout;
      protected $_data;
      protected $_viewCode;
      
      
      /*
       * Render the page with the selected layout
       * @param string $viewpath Path to the view to render
       */
      public function render($viewpath = "home.php"){
          $this->_viewCode = file_get_contents( getcwd()."/theme/".$viewpath);
          include(isset($this->_layout) ? $this->_layout: "layout.php");
      }
      
      
      /*
       * Set the layput for the current page
       * @param string $layoutpath Path to the layout fro the current view
       */
      public function setLayout($layoutpath){
          $this->_layout = $layoutpath;
          return $this;
      }
      
      /*
       * Render the page content
       */
      public function pageContent(){
          eval ("?>".$this->_viewCode);
      }
      
      public function __set($name, $arg){
          $this->data[$name] = $arg[0];
      }
      
      public function __get($name){
          return $this->data[$name];
      }
      
  }
?>
