<?xml version="1.0" encoding="UTF-8"?>

<!--
    Document   : itnews.xsl
    Created on : 2011. augusztus 11., 10:37
    Author     : peter
    Description:
        Purpose of transformation follows.
-->

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <xsl:template match="itnews">
        <table border="1">
            <xsl:apply-templates select="newsitem"/> 
        </table>
    </xsl:template>
    
    <xsl:template match="newsitem">
        <tr>
            <td>
                <h3><xsl:value-of select="title"/></h3>
            </td>
            <td>
                <b>
                    <xsl:value-of select="author"/>
                </b>
                <xsl:text> writes: </xsl:text>
                <i>
                    <xsl:value-of select="article"/>
                </i>
            </td>
        </tr>
    </xsl:template>

</xsl:stylesheet>
