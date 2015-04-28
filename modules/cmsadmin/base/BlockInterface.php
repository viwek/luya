<?php

namespace cmsadmin\base;

interface BlockInterface
{
    public function extraVars();

    public function jsonConfig();
    
    public function name();
    
    public function config();
    
    public function twigFrontend();
    
    public function twigAdmin();
}