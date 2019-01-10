<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LDAPController extends Controller
{
    public function login(Request $request) {
        $username = $request->username;
        $password = $request->password;
        
        $auth = $this->ldapAuth($username, $password);
        var_dump($auth);
        
    }

    public function ldapAuth($username, $password)
    {
        /**************************************************
		  Bind to an Active Directory LDAP server and look
		  something up.
         ***************************************************/
		  //$SearchFor="doni.romdoni";               //What string do you want to find?
        $SearchFor = $username;
        $SearchField = "samaccountname";   //In what Active Directory field do you want to search for the string?
        $ldapport = 389;

        $LDAPHost = "ldap.tap-agri.com";       //Your LDAP server DNS Name or IP Address
        $dn = "OU=B.Triputra Agro Persada, DC=tap, DC=corp"; //Put your Base DN here
        $LDAPUserDomain = "@tap";  //Needs the @, but not always the same as the LDAP server domain
		  //$LDAPUser = "sabrina.davita";        //A valid Active Directory login
          //$LDAPUserPassword = "T4pagri";
          
        $LDAPUser = $username;
        $LDAPUserPassword = $password;
        $LDAPFieldsToFind = array("cn", "givenname", "company", "samaccountname", "homedirectory", "telephonenumber", "mail");

        $cnx = ldap_connect($LDAPHost, $ldapport);

        if ($cnx) {
            ldap_set_option($cnx, LDAP_OPT_PROTOCOL_VERSION, 3);  //Set the LDAP Protocol used by your AD service
            ldap_set_option($cnx, LDAP_OPT_REFERRALS, 0);         //This was necessary for my AD to do anything
            $connect = ldap_bind($cnx, $LDAPUser . $LDAPUserDomain, $LDAPUserPassword) or die(array("status"=>0, "message"=>"invalid user or password"));
          //error_reporting (E_ALL ^ E_NOTICE);   //Suppress some unnecessary messages
            if($connect) {
                $filter = "($SearchField=$SearchFor*)"; //Wildcard is * Remove it if you want an exact match
                $sr = ldap_search($cnx, $dn, $filter, $LDAPFieldsToFind);
                $info = ldap_get_entries($cnx, $sr);
		  //if ($x==0) { print "Oops, $SearchField $SearchFor was not found. Please try again.\n"; }

                return $info;
            }else{
                return array('status' => 0, 'message' => "username or password invalid");
            }
        } else {
            return  array('status'=>0, 'message'=> "connection is not established");
        }
    }
}
