<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <head>
                <title>Cricket Rankings</title>
                <style>
                    table {
                        width: 100%;
                        border-collapse: collapse;
                    }
                    th, td {
                        border: 1px solid #dddddd;
                        text-align: left;
                        padding: 8px;
                    }
                    th .Rank {
                        background-color: #f2f2f2;
                        width: 150px;
                    }
                    th .Country {
                        width: 150px;
                    }
                </style>
            </head>
            <body>
                <h1><center>Cricket Rankings</center></h1>
                <h2>Cricket Men's Test Batting Rankings</h2>
                <table>
                    <tr>
                        <th>Rank</th>
                        <th>Country</th>
                        <th>Player Name</th>
                        <th>Ratings</th>
                    </tr>
                    <xsl:for-each select="cricketRankings/mensTestbatter/country/player">
                        <xsl:sort select="number(rating)" data-type="number" order="descending"/>
                        <xsl:sort select="number(rank)" data-type="number"/>
                        <xsl:sort select="ancestor::country/@name" data-type="text"/>
                        <tr>
                            <td><xsl:value-of select="rank"/></td>
                            <td><xsl:value-of select="ancestor::country/@name"/></td>
                            <td><xsl:value-of select="name"/></td>
                            <td><xsl:value-of select="rating"/></td>
                        </tr>
                    </xsl:for-each>
                </table>

                <h2>Cricket Men's ODI Batting Rankings</h2>
                <table>
                    <tr>
                        <th>Rank</th>
                        <th>Country</th>
                        <th>Player Name</th>
                        <th>Ratings</th>
                    </tr>
                    <xsl:for-each select="cricketRankings/mensODIbatter/country/player">
                        <xsl:sort select="number(rating)" data-type="number" order="descending"/>
                        <xsl:sort select="number(rank)" data-type="number"/>
                        <xsl:sort select="ancestor::country/@name" data-type="text"/>
                        <tr>
                            <td><xsl:value-of select="rank"/></td>
                            <td><xsl:value-of select="ancestor::country/@name"/></td>
                            <td><xsl:value-of select="name"/></td>
                            <td><xsl:value-of select="rating"/></td>
                        </tr>
                    </xsl:for-each>
                </table>

                <h2>Cricket Men's T20 Batting Rankings</h2>
                <table>
                    <tr>
                        <th>Rank</th>
                        <th>Country</th>
                        <th>Player Name</th>
                        <th>Ratings</th>
                    </tr>
                    <xsl:for-each select="cricketRankings/mensT20batter/country/player">
                        <xsl:sort select="number(rating)" data-type="number" order="descending"/>
                        <xsl:sort select="number(rank)" data-type="number"/>
                        <xsl:sort select="ancestor::country/@name" data-type="text"/>
                        <tr>
                            <td><xsl:value-of select="rank"/></td>
                            <td><xsl:value-of select="ancestor::country/@name"/></td>
                            <td><xsl:value-of select="name"/></td>
                            <td><xsl:value-of select="rating"/></td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>