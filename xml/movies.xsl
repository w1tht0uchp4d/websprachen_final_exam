<?xml version="1.0" encoding="utf-8" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <!-- define output -->
    <xsl:output encoding="utf-8" method="html" indent="yes"/>

    <!-- root -->
    <xsl:template match="/movies">
        <h4>Movie List</h4>
        <ul>
            <xsl:apply-templates select="movie"></xsl:apply-templates>
        </ul>
    </xsl:template>

    <!-- any movie as a list item-->
    <xsl:template match="movie">
        <li>
            <div class="movie">
                <div class="poster">
                    <xsl:element name="img">
                        <xsl:attribute name="src">
                            <xsl:value-of select="poster/@path"/>/<xsl:value-of select="poster/text()"/>
                        </xsl:attribute>
                    </xsl:element>
                </div>
                <div class="info">
                    <h3><xsl:value-of select="title/text()"/></h3>
                    <p><xsl:value-of select="description"/></p>
                    <xsl:if test="remark">
                        <p class="remark">
                            <xsl:value-of select="remark"/>
                        </p>
                    </xsl:if>
                </div>
            </div>
        </li>
    </xsl:template>

</xsl:stylesheet>