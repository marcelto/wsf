--TEST--
differnet schema names and php names in the service, using the classmap trick
--FILE--
<?php

$url = "http://localhost/services/wsdl_generation/different_class_and_php_names_service.php?wsdl";
$fp = fopen($url, 'r');
$result = fpassthru($fp);
fclose($fp);

echo $result;

?>
--EXPECT--
<?xml version="1.0" encoding="UTF-8"?>
<definitions xmlns="http://schemas.xmlsoap.org/wsdl/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:tns="http://www.wso2.org/php" xmlns:tnx="http://www.wso2.org/php/xsd" xmlns:soap="http://schemas.xmlsoap.org/wsdl/soap/" xmlns:wsdl="http://schemas.xmlsoap.org/wsdl/" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/" xmlns:http="http://www.w3.org/2003/05/soap/bindings/HTTP/" xmlns:wsaw="http://www.w3.org/2006/05/addressing/wsdl" targetNamespace="http://www.wso2.org/php"><types><xsd:schema elementFormDefault="qualified" targetNamespace="http://www.wso2.org/php/xsd" xmlns:ns0="http://mytest/xsd1" xmlns:ns2="http://mytest/xsd3"><xsd:import namespace="http://mytest/xsd3"/><xsd:import namespace="http://mytest/xsd1"/><xsd:element name="echoString" type="ns0:Foox"/><xsd:element name="echoStringResponse" type="ns2:FooResponse"/></xsd:schema><xsd:schema elementFormDefault="qualified" targetNamespace="http://mytest/xsd1" xmlns:ns1="http://mytest/xsd2"><xsd:import namespace="http://mytest/xsd2"/><xsd:complexType name="Foox"><xsd:sequence><xsd:element name="foo1" type="xsd:string"/><xsd:element name="foo2" type="xsd:QName"/><xsd:element name="foo3" maxOccurs="unbounded" type="xsd:dateTime"/><xsd:element name="foo4" type="ns1:Bay"/></xsd:sequence></xsd:complexType><xsd:complexType name="Boop"><xsd:sequence><xsd:element name="boo1" maxOccurs="unbounded" type="xsd:string"/><xsd:element name="boo2" maxOccurs="unbounded" type="xsd:duration"/></xsd:sequence></xsd:complexType></xsd:schema><xsd:schema elementFormDefault="qualified" targetNamespace="http://mytest/xsd2" xmlns:ns0="http://mytest/xsd1"><xsd:import namespace="http://mytest/xsd1"/><xsd:complexType name="Bay"><xsd:sequence><xsd:element name="bar1" maxOccurs="unbounded" type="xsd:string"/><xsd:element name="bar2" maxOccurs="unbounded" type="ns0:Boop"/></xsd:sequence></xsd:complexType></xsd:schema><xsd:schema elementFormDefault="qualified" targetNamespace="http://mytest/xsd3" xmlns:ns3="http://mytest/xsd1"><xsd:import namespace="http://mytest/xsd1"/><xsd:complexType name="FooResponse"><xsd:sequence><xsd:element name="ret_value" maxOccurs="unbounded" type="ns3:Boop"/></xsd:sequence></xsd:complexType></xsd:schema></types><message name="echoString"><part name="parameters" element="tnx:echoString"/></message><message name="echoStringResponse"><part name="parameters" element="tnx:echoStringResponse"/></message><portType name="services_wsdl_generation_different_class_and_php_names_service.phpPortType"><operation name="echoString"><input message="tns:echoString"/><output message="tns:echoStringResponse"/></operation></portType><binding name="services_wsdl_generation_different_class_and_php_names_service.phpSOAPBinding" type="tns:services_wsdl_generation_different_class_and_php_names_service.phpPortType"><soap:binding xmlns="http://schemas.xmlsoap.org/wsdl/soap/" transport="http://schemas.xmlsoap.org/soap/http" style="document"/><operation xmlns:default="http://schemas.xmlsoap.org/wsdl/soap/" name="echoString"><soap:operation xmlns="http://schemas.xmlsoap.org/wsdl/soap/" soapAction="urn:echoString" style="document"/><input xmlns:default="http://schemas.xmlsoap.org/wsdl/soap/"><soap:body xmlns="http://schemas.xmlsoap.org/wsdl/soap/" use="literal"/></input><output xmlns:default="http://schemas.xmlsoap.org/wsdl/soap/"><soap:body xmlns="http://schemas.xmlsoap.org/wsdl/soap/" use="literal"/></output></operation></binding><service name="services_wsdl_generation_different_class_and_php_names_service.php"><port xmlns:default="http://schemas.xmlsoap.org/wsdl/soap/" name="services_wsdl_generation_different_class_and_php_names_service.phpSOAPPort_Http" binding="tns:services_wsdl_generation_different_class_and_php_names_service.phpSOAPBinding"><soap:address xmlns="http://schemas.xmlsoap.org/wsdl/soap/" location="http://localhost/services/wsdl_generation/different_class_and_php_names_service.php"/></port></service></definitions>
3969